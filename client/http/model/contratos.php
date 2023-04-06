<?php

namespace Http\model;

use Http\model\Conexao as ligar;

class contratos
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    # Novo contrato
    public static function enviarContrato($id_cliente, $id_prestador, $id_servico, $endereco_atual, $endereco_destino)
    {
        $erros = null;
        if (ltrim(empty($endereco_destino)) || ltrim(empty($endereco_atual))) {
            $erros = 'Verifique o seu endereço atual ou final';
        }

        # checa se já este cliente fez um pedido de contrato
        $check = self::getInstance()->query("SELECT *FROM contratos
        WHERE id_cliente = '$id_cliente' AND id_prestador = '$id_prestador' AND id_servico = '$id_servico'");

        if ($check->rowCount() > 0) {
            $erros = 'Verificamos que já solicitou um contrato para com este prestador. A sua solicitação encontra-se pendente, por favor aguarde por feeedback, que pode chegar a qualquer momento no seu e-mail ou whatsapp. Obrigado.';
        }
        $contrato = self::getInstance()->prepare("INSERT INTO contratos 
        (local_inicial, local_destino, id_cliente, id_prestador, id_servico)
        VALUES(?,?,?,?,?)");

        $contrato->bindValue(1, $endereco_atual);
        $contrato->bindValue(2, $endereco_destino);
        $contrato->bindValue(3, $id_cliente);
        $contrato->bindValue(4, $id_prestador);
        $contrato->bindValue(5, $id_servico);

        if (!$erros) {
            if ($contrato->execute()) {
                return ['status' => 'sucesso', "msg" => "Obrigado, recebemos a sua solicitação de contrato, brevemente, receverá um E-mail ou uma resposta no seu Whatsapp. Fique atento."];
            } else {
                return ['status' => 'erro', "msg" => "Algo deu errado"];
            }
        } else {
            return ['status' => 'erro', "msg" => $erros];
        }
    }
}
