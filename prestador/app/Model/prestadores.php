<?php

namespace App\Model;

use App\Model\Conexao as ligar;

use Exception;

class prestadores
{

    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* VALIDATE DATA */

    public static function validateDate($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador)
    {
        $erro = null;

        if (!preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊîÎôÔûÛçÇ&@_  ]*$/", $nome_prestador) || ltrim(strlen($nome_prestador) < 0) || $nome_prestador ==  "" || $nome_prestador == null || empty($nome_prestador)) {
            $erro = 'Verifica o nome inserido.';
        }

        if (!is_numeric($whatsapp_prestador) || !preg_match("/^[0-9]*$/", $whatsapp_prestador) || 9 > strlen($whatsapp_prestador) || 9 < strlen($whatsapp_prestador) || $whatsapp_prestador[0] != 9) {
            $erro = 'Verfica o whatsapp inserido.';
        }

        if (!filter_var($email_prestador, FILTER_VALIDATE_EMAIL)) {
            $erro = 'O E-mail inserido não é válido';
        }

        $checkEmail = self::getInstance()->query("SELECT *FROM prestador WHERE prestador_email = '$email_prestador'");
        if ($checkEmail->rowCount() > 0) {
            $erro = 'O E-mail ' . $email_prestador . ' já está cadastrado';
        }
        $checkWhatsapp = self::getInstance()->query("SELECT *FROM prestador WHERE prestador_whatsapp = '$whatsapp_prestador'");
        if ($checkWhatsapp->rowCount() > 0) {
            $erro = 'O Whastapp ' . $whatsapp_prestador . ' já está cadastrado';
        }

        if (strlen($senha_prestador) <= 8) {
            $erro = 'A senha deve conter no mínimo 8 catacteres.';
        }

        if ($tipo_prestador <= 0) {
            $erro = 'Selecione o tipo de prestação';
        }

        /*   if (filter_var($mapGoole_prestador, FILTER_SANITIZE_URL)) {
            $erro = 'O link do Google map não é válido';
        } */

        return $erro;
    }

    /*
         GET TYPE O PRESTADORES 
         AFTER THIS, WE WILL SHOW ALL DATAS
         THESE DATAS IS SHOWED IN SELECT FORM
     */

    public static function getTypeOfPrestadores()
    {

        $query = self::getInstance()->query("SELECT *FROM tipo_prestador ORDER BY tipo_prestador");
        $dataRow = $query->fetchAll();

        return $dataRow;
    }

    /* Get All data by id of prestador */

    public static function getAllData($id_prestador)
    {
        /* MAKE OR JOIN FORIGN KEY TO ANOTHER TABLES */
        $get  = self::getInstance()->query("SELECT *FROM prestador AS P
        INNER JOIN tipo_prestador AS TP ON P.id_tipo_orestador = TP.idtipo_prestador
        WHERE P.idprestador = '$id_prestador'
        ");

        $rows = $get->fetch();

        return $rows;
    }

    public static function getget()
    {
        $get  = self::getInstance()->query("SELECT *FROM prestador AS P
        INNER JOIN tipo_prestador AS TP ON P.id_tipo_orestador = TP.idtipo_prestador
        ");

        $rows = $get->fetchAll();

        return $rows;
    }

    /* STORE */

    public static function storer($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador, $arquivo_certidao, $arquivo_nif, $arquivo_bi)
    {
        try {
            $formatos_permitidos = array('pdf');

            // certidão

            $certidao = array(
                'arquivo'  => $arquivo_certidao['name'],
                'temporal' => $arquivo_certidao['tmp_name'],
                'tipo' => strtolower($arquivo_certidao['type']),
                'formato'  => strtolower(pathinfo($arquivo_certidao['name'], PATHINFO_EXTENSION)),
                'nome' => uniqid() . '.' . strtolower(pathinfo($arquivo_certidao['name'], PATHINFO_EXTENSION)),
                'diretorio' => './assets/docs/prestador/'
            );

            if (in_array($certidao['formato'], $formatos_permitidos)) {

                # ========================= VERIFICA O DIRECTORIO =====================
                if (is_dir($certidao['diretorio'])) {

                    # ===================================== TENTA O UPLOAD ==================
                    if (move_uploaded_file($certidao['temporal'], $certidao['diretorio'] . $certidao['nome'])) {
                        $arquivo_certidao = $certidao['nome'];
                    } else {
                        $erros = 'Falha no upload.';
                    }
                } else {
                    mkdir($certidao['diretorio']);
                    move_uploaded_file($certidao['temporal'], $certidao['diretorio'] . $certidao['nome']);
                    $arquivo_certidao = $certidao['nome'];
                }
            } else {
                $arquivo_certidao = "";
                $erros = 'Formato .' . $certidao['formato'] . ' não é permitido';
            }

            // nif

            $nif = array(
                'arquivo'  => $arquivo_nif['name'],
                'temporal' => $arquivo_nif['tmp_name'],
                'tipo' => strtolower($arquivo_nif['type']),
                'formato'  => strtolower(pathinfo($arquivo_nif['name'], PATHINFO_EXTENSION)),
                'nome' => uniqid() . '.' . strtolower(pathinfo($arquivo_nif['name'], PATHINFO_EXTENSION)),
                'diretorio' => './assets/docs/prestador/'
            );

            if (in_array($nif['formato'], $formatos_permitidos)) {

                # ========================= VERIFICA O DIRECTORIO =====================
                if (is_dir($nif['diretorio'])) {

                    # ===================================== TENTA O UPLOAD ==================
                    if (move_uploaded_file($nif['temporal'], $nif['diretorio'] . $nif['nome'])) {
                        $arquivo_nif = $nif['nome'];
                    } else {
                        $erros = 'Falha no upload.';
                    }
                } else {
                    mkdir($nif['diretorio']);
                    move_uploaded_file($nif['temporal'], $nif['diretorio'] . $nif['nome']);
                    $arquivo_nif = $nif['nome'];
                }
            } else {
                $arquivo_nif = "";
                $erros = 'Formato .' . $nif['formato'] . ' não é permitido';
            }

            // BI

            $bi = array(

                'arquivo'  => $arquivo_bi['name'],
                'temporal' => $arquivo_bi['tmp_name'],
                'tipo' => strtolower($arquivo_bi['type']),
                'formato'  => strtolower(pathinfo($arquivo_bi['name'], PATHINFO_EXTENSION)),
                'nome' => uniqid() . '.' . strtolower(pathinfo($arquivo_bi['name'], PATHINFO_EXTENSION)),
                'diretorio' => './assets/docs/prestador/'
            );

            if (in_array($bi['formato'], $formatos_permitidos)) {

                # ========================= VERIFICA O DIRECTORIO =====================
                if (is_dir($bi['diretorio'])) {

                    # ===================================== TENTA O UPLOAD ==================
                    if (move_uploaded_file($bi['temporal'], $bi['diretorio'] . $bi['nome'])) {
                        $arquivo_bi = $bi['nome'];
                    } else {
                        $erros = 'Falha no upload.';
                    }
                } else {
                    mkdir($bi['diretorio']);
                    move_uploaded_file($bi['temporal'], $bi['diretorio'] . $bi['nome']);
                    $arquivo_bi = $bi['nome'];
                }
            } else {
                $arquivo_bi = "";
                $erros = 'Formato .' . $nif['formato'] . ' não é permitido';
            }


            $store = self::getInstance()->prepare("INSERT INTO prestador (prestador_nome, id_tipo_orestador, prestador_identificacao, prestador_localizacao, prestador_email, prestador_whatsapp, prestador_senha, prestador_arquivo_certidao, prestador_arquivo_nif, prestador_arquivo_bi)
            VALUES(?,?,?,?,?,?,?,?,?,?)
            ");

            $store->bindValue(1, $nome_prestador);
            $store->bindValue(2, $tipo_prestador);
            $store->bindValue(3, $nif_prestador);
            $store->bindValue(4, $mapGoole_prestador);
            $store->bindValue(5, $email_prestador);
            $store->bindValue(6, $whatsapp_prestador);
            $store->bindValue(7, $senha_prestador);
            $store->bindValue(8, $arquivo_certidao);
            $store->bindValue(9, $arquivo_nif);
            $store->bindValue(10, $arquivo_bi);
            //$store->bindValue(8, 1);

            $erros = self::validateDate($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador);
            if ($erros == null) {
                if ($store->execute()) {
                    session_start();
                    $data = self::getInstance()->query("SELECT *FROM prestador WHERE prestador_email = '$email_prestador'");
                    $_SESSION['id-prestador'] = $data->fetch()->idprestador;
                    return ['status' => 'sucesso', 'msg' => 'Sucesso ao registrar'];
                } else {
                    return ['status' => 'erro', 'msg' => 'Algo deu errado'];
                }
            } else {
                return ['status' => 'erro', 'msg' => $erros];
            }
        } catch (\Throwable $th) {
            return ['status' => 'erro', 'msg' => $th->getMessage()];
        }
    }

    /* Editar dados pessoa */

    public static function editarDadosPessoas($nome_prestador, $email_prestador, $nif_prestador, $id_prestador)
    {
        $erro = "";
        if (!preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊîÎôÔûÛçÇ&@_  ]*$/", $nome_prestador) || ltrim(strlen($nome_prestador) < 0) || $nome_prestador ==  "" || $nome_prestador == null || empty($nome_prestador)) {
            $erro = 'Verifica o nome inserido.';
        }
        if (!filter_var($email_prestador, FILTER_VALIDATE_EMAIL)) {
            $erro = 'O E-mail inserido não é válido';
        }

        try {
            $update = self::getInstance()->prepare("UPDATE prestador SET
            prestador_nome = ?,
            prestador_email = ?,
            prestador_identificacao = ?
            WHERE idprestador = ?
            ");

            $update->bindValue(1, $nome_prestador);
            $update->bindValue(2, $email_prestador);
            $update->bindValue(3, $nif_prestador);
            $update->bindValue(4, $id_prestador);

            if ($erro == "") {
                if ($update->execute()) {
                    return ['status' => 'sucesso', 'msg' => 'Dados pessoais atualizados.'];
                } else {
                    return ['status' => 'erro', 'msg' => 'Falha interna'];
                }
            } else {
                return ['status' => 'erro', 'msg' => $erro];
            }
        } catch (\Throwable $th) {
            return ['status' => 'erro', 'msg' => $th->getMessage()];
        }
    }

    /* Adicionar Foto */

    public static function addFoto($foto, $id_prestador)
    {
        $erros = null;
        $arquivo = array(
            'arquivo'  => $foto['name'],
            'temporal' => $foto['tmp_name'],
            'tipo' => strtolower($foto['type']),
            'formato'  => strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION)),
            'nome' => time() . '.' . strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION)),
            'diretorio' => './assets/img/prestador/'
        );

        $formatos_permitidos = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif', 'image/jfif', 'image/webp', 'video/mp4');

        # =========================== VERIFICA OS FORMATOS PERMITIDOS =====================

        if ($arquivo['arquivo'] == null) {
            $foto = "null";
        } else {
            if (in_array($arquivo['tipo'], $formatos_permitidos)) {

                # ========================= VERIFICA O DIRECTORIO =====================
                if (is_dir($arquivo['diretorio'])) {

                    # ===================================== TENTA O UPLOAD ==================
                    if (move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome'])) {
                        $foto = $arquivo['nome'];
                    } else {
                        $erros = 'Falha no upload.';
                    }
                } else {
                    mkdir($arquivo['diretorio']);
                    move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome']);
                    $foto = $arquivo['nome'];
                }
            } else {
                $foto = "";
                $erros = 'Formato .' . $arquivo['formato'] . ' não é permitido';
            }

            $send = self::getInstance()->prepare("UPDATE prestador SET prestador_foto = ? WHERE idprestador = ?");
            $send->bindValue(1, $foto);
            $send->bindValue(2, $id_prestador);

            if (!$erros) {
                if ($send->execute()) {
                    return ['status' => 'sucesso', 'msg' => 'Foto adicionada'];
                } else {
                    return ['status' => 'erro', 'msg' => 'Algo deu errado'];
                }
            } else {
                return ['status' => 'erro', 'msg' => $erros];
            }
        }
    }

    /* LOGIN */

    public static function login($email, $password)
    {

        $selectEmail = self::getInstance()->query("SELECT prestador_email FROM prestador WHERE prestador_email = '" . $email . "'");
        if ($selectEmail->rowCount() > 0) {
            $selectPassord = self::getInstance()->query("SELECT prestador_senha FROM prestador WHERE prestador_senha = '" . $password . "'");
            if ($selectPassord->rowCount() > 0) {
                $data = self::getInstance()->query("SELECT *FROM prestador WHERE prestador_email = '$email' AND prestador_senha = '$password'");
                if ($data->rowCount() > 0) {
                    // verfica se aconta esta atida
                    /*  $check = self::getInstance()->query("SELECT prestador_estado_conta FROM prestador WHERE prestador_email = '$email'");
                    if ($check->fetch()->prestador_estado_conta == '0') {
                        return ['status' => 'erro', 'msg' => 'A sua conta está sendo analizada, por isso está temporariamente indispónivel para o uso.'];
                    } else { */
                    session_start();
                    $_SESSION['id-prestador'] = $data->fetch()->idprestador;
                    //}
                    return ['status' => 'sucesso', 'msg' => 'Acesso garantido'];
                } else {
                    return ['status' => 'erro', 'msg' => 'Verifique se os seus dados estão corretos', 'data' => $_POST];
                }
            } else {

                return ['status' => 'erro', 'msg' => 'palavra-passe incorreta'];
            }
        } else {
            return ['status' => 'erro', 'msg' => 'E-mail inexistente'];
        }
    }
}
