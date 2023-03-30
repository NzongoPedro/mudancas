<?php

namespace App\Model;

use App\Model\Conexao as ligar;
use Exception;
use PDOException;

class publicacoes
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* VALIDATE DATA */
    public static function validateDate($publicacao_titulo, $publicacao_texto)
    {
        $erro = null;

        if (!preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊîÎôÔûÛçÇ&@_ 0-9 ]*$/", $publicacao_titulo) || ltrim(strlen($publicacao_titulo) < 0) || $publicacao_titulo ==  "" || $publicacao_titulo == null || empty($publicacao_titulo)) {
            $erro = 'Verifica o titulo da publicação.';
        }

        if (empty($publicacao_texto)) {
            $erro = 'Verifica o texto da publicação.';
        }

        return $erro;
    }

    public static function getAllData($id_publicacao)
    {
        /* MAKE OR JOIN FORIGN KEY TO ANOTHER TABLES */
        $get  = self::getInstance()->query("SELECT *FROM publicacoes AS Pub
        INNER JOIN prestador AS P ON Pub.id_prestador = P.idprestador
        WHERE Pub.id_prestador='$id_publicacao ' 
        ");

        $rows = $get->fetch();

        return $rows;
    }

    public static function sents($publicacao_titulo, $publicacao_texto, $publicacao_arquivo, $publicacao_data, $id_prestador, $idpublicacao)
    {
        try {
            $verifica = self::getInstance()->query("SELECT * FROM publicacoes WHERE idpublicacao='$idpublicacao'");

            if ($verifica->rowCount() > 0) {
                $sent = self::getInstance()->prepare("UPDATE  publicacoes SET 
                publicacao_titulo=?, 
                publicacao_texto=?
                WHERE idpublicacao=?  
                ");

                $sent->bindValue(1, $publicacao_titulo);
                $sent->bindValue(2, $publicacao_texto);
                $sent->bindValue(3, $idpublicacao);

                $erros = self::validateDate($publicacao_titulo, $publicacao_texto, $publicacao_arquivo, $publicacao_data, $id_prestador);
                if (!$erros) {
                    if ($sent->execute()) {
                        return ['status' => 'sucesso', 'msg' => 'Publicação editada com sucesso'];
                    } else {
                        return ['status' => 'erro', 'msg' => 'Algo deu errado'];
                    }
                } else {
                    return ['status' => 'erro', 'msg' => $erros];
                }
            } else {
                $arquivo = array(
                    'arquivo'  => $publicacao_arquivo['name'],
                    'temporal' => $publicacao_arquivo['tmp_name'],
                    'tipo' => strtolower($publicacao_arquivo['type']),
                    'formato'  => strtolower(pathinfo($publicacao_arquivo['name'], PATHINFO_EXTENSION)),
                    'nome' => time() . '.' . strtolower(pathinfo($publicacao_arquivo['name'], PATHINFO_EXTENSION)),
                    'diretorio' => './assets/img/post/'
                );

                $formatos_permitidos = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif', 'image/jfif', 'image/webp', 'video/mp4');

                # =========================== VERIFICA OS FORMATOS PERMITIDOS =====================

                if ($arquivo['arquivo'] == null) {
                    $publicacao_arquivo = "null";
                } else {
                    if (in_array($arquivo['tipo'], $formatos_permitidos)) {

                        # ========================= VERIFICA O DIRECTORIO =====================
                        if (is_dir($arquivo['diretorio'])) {

                            # ===================================== TENTA O UPLOAD ==================
                            if (move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome'])) {
                                $publicacao_arquivo = $arquivo['nome'];
                            } else {
                                $erros = 'Falha no upload.';
                            }
                        } else {
                            mkdir($arquivo['diretorio']);
                            move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome']);
                            $publicacao_arquivo = $arquivo['nome'];
                        }
                    } else {
                        $publicacao_arquivo = "";
                        $erros = 'Formato .' . $arquivo['formato'] . ' não é permitido';
                    }
                }

                $publicacao_data = date('d/m/y');
                $sent = self::getInstance()->prepare("INSERT INTO publicacoes (publicacao_titulo, publicacao_texto,publicacao_arquivo, id_prestador)
                VALUES(?,?,?,?)
                ");

                $sent->bindValue(1, $publicacao_titulo);
                $sent->bindValue(2, $publicacao_texto);
                $sent->bindValue(3, $publicacao_arquivo);
                $sent->bindValue(4, $id_prestador);

                $erros = null;
                if (!preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊîÎôÔûÛçÇ&@_ 0-9 ]*$/", $publicacao_titulo) || ltrim(strlen($publicacao_titulo) < 0) || $publicacao_titulo ==  "" || $publicacao_titulo == null || empty($publicacao_titulo)) {
                    $erros = 'Verifica o titulo da publicação.';
                }

                if (empty($publicacao_texto)) {
                    $erros = 'Verifica o texto da publicação.';
                }

                if (!$erros) {
                    if ($sent->execute()) {
                        return ['status' => 'sucesso', 'msg' => 'Publicação criada com sucesso'];
                    } else {
                        return ['status' => 'erro', 'msg' => 'Algo deu errado'];
                    }
                } else {
                    return ['status' => 'erro', 'msg' => $erros];
                }
            }
        } catch (PDOException $th) {
            return ['status' => 'erro', 'msg' => $th->getMessage()];
        }
    }

    public static function mostraPublicacoesClients($id_publicacao)
    {

        // BUSCA A CHAVE ESTRAGENHEIRA E JUNTA AS TABELAS PRESTADORES E publicação
        $publicacao = self::getInstance()->query("SELECT *FROM publicacoes AS Pb
        INNER JOIN prestador AS P ON P.idprestador = Pb.id_prestador
        WHERE Pb.idpublicacao = '$id_publicacao' 
        ");

        $dados = $publicacao->fetchAll(); // guarda os dados resultantes numa váriavel

        return $dados; // retorna os dados para a controller
    }


    public static function mostraPublicacoes($id_prestador)
    {

        // BUSCA A CHAVE ESTRAGENHEIRA E JUNTA AS TABELAS PRESTADORES E publicação
        $publicacao = self::getInstance()->query("SELECT *FROM publicacoes AS Pb
        INNER JOIN prestador AS P ON P.idprestador = Pb.id_prestador
        WHERE Pb.id_prestador = '$id_prestador' 
        ORDER BY idpublicacao desc
        ");

        $dados = $publicacao->fetchAll(); // guarda os dados resultantes numa váriavel

        return $dados; // retorna os dados para a controller
    }

    public static function eliminarPublicacoes($id_publicacao)
    {
        // eliminar  publicação
        $foto = self::getInstance()->query("SELECT publicacao_arquivo FROM publicacoes WHERE idpublicacao = '$id_publicacao'")->fetch();
        unlink('./assets/img/post/' . $foto->publicacao_arquivo);

        $eliminar_post = self::getInstance()->query("DELETE FROM publicacoes
        WHERE idpublicacao = '$id_publicacao'");

        if ($eliminar_post) {
            return ['status' => 'sucesso', 'msg' => 'Publicação eliminada com sucesso'];
        } else {
            return ['status' => 'erro', 'msg' => 'Falha ao eliminar a publicação'];
        }
    }

    public static function mostraPublicacoesModal($idpublicacao)
    {

        $publicacao = self::getInstance()->query("SELECT *FROM publicacoes 
        WHERE idpublicacao = '$idpublicacao' 
        ");

        $dados = $publicacao->fetchAll(); // guarda os dados resultantes numa váriavel

        return $dados; // retorna os dados para a controller
    }

    public static function editarPublicacoes($id_publicacao, $publicacao_titulo, $publicacao_texto)
    {
        // editar  publicação

        $editar_post = self::getInstance()->query("UPDATE publicacoes SET
        publicacao_titulo=$publicacao_titulo , publicacao_texto=$publicacao_texto
        WHERE idpublicacao = $id_publicacao");

        if ($editar_post) {
            return ['status' => 'sucesso', 'msg' => 'Publicação editada com sucesso'];
        } else {
            return ['status' => 'erro', 'msg' => 'Falha ao editar a publicação'];
        }
    }
}
