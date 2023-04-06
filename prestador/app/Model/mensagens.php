<?php

namespace App\Model;

use App\Model\Conexao as ligar;

class mensagens
{


    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* VER MENSAGEM POR ID PRESTADOR */
    public static function verMensagem($id_prestador)
    {
        $sms = self::getInstance()->query("SELECT *FROM mensagens as msg
        INNER JOIN clientes AS CL ON msg.id_cliente = CL.idcliente
        INNER JOIN prestador AS PT ON msg.id_prestador = PT.idprestador
        WHERE msg.id_prestador = '$id_prestador'
        GROUP BY msg.id_cliente HAVING COUNT(msg.id_cliente)>0
        ");
        return $sms->fetchAll();
    }
}
