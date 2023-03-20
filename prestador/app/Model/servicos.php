<?php

namespace App\Model;

use App\Model\Conexao as ligar;

class servicos
{

    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* SAVE OR UPDATE TO DATA BASE */

    public static function store($designacao, $descricao, $id_prestador)
    {
        $erros = "";

        if (!isset($designacao) || empty($designacao)) {
            $erros = 'Escreva o nome do serviços.';
        }

        if (!isset($descricao) || empty($descricao)) {
            $erros = 'Escreva a descricção do serviço.';
        }

        // verifica se ja existe um serviço publicado para este prestador

        $verificador = self::getInstance()->query("SELECT *FROM servicos WHERE id_prestador = '$id_prestador'");

        if ($verificador->rowCount() > 0) { // já existir, faz um UPDATE
            $store = self::getInstance()->prepare("UPDATE servicos SET
            servico_designacao = ?, 
            servico_descricao = ?
             WHERE id_prestador = ?");
            $store->bindValue(1, $designacao);
            $store->bindValue(2, $descricao);
            $store->bindValue(3, $id_prestador);

            if ($erros == "") {
                if ($store->execute()) {
                    return ['status' => 'sucesso', 'msg' => 'Serviço atualizado'];
                } else {

                    return ['status' => 'erro', 'msg' => 'Falha interna'];
                }
            } else {
                return ['status' => 'erro', 'msg' => $erros];
            }
        } else {

            $store = self::getInstance()->prepare("INSERT INTO servicos (servico_designacao, servico_descricao, tipo_servico_idtipo_servico, id_prestador)
            VALUES(?,?,?,?)");
            $store->bindValue(1, $designacao);
            $store->bindValue(2, $descricao);
            $store->bindValue(3, 1);
            $store->bindValue(4, $id_prestador);

            if ($erros == "") {
                if ($store->execute()) {
                    return ['status' => 'sucesso', 'msg' => 'Serviço publicado'];
                } else {

                    return ['status' => 'erro', 'msg' => 'Falha interna'];
                }
            } else {
                return ['status' => 'erro', 'msg' => $erros];
            }
        }
    }

    /* 
    ####### RETORNA O SERVIÇO PRESTADO DE UM PRESTADOR
    */

    public static function mostraServicoPrestador($id_prestador)
    {

        // BUSCA A CHAVE ESTRAGENHEIRA E JUNTA AS TABELAS PRESTADORES E SERVIOS
        $servico = self::getInstance()->query("SELECT *FROM servicos AS S
        INNER JOIN prestador AS P ON P.idprestador = S.id_prestador
        WHERE S.id_prestador = '$id_prestador'");

        $dados = $servico->fetchAll(); // guarda os dados resultantes numa váriavel

        return $dados; // retorna os dados para a controller
    }
}
