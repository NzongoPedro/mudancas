<?php

namespace Http\model;

use Http\model\Conexao as ligar;

class mensagens
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* Ver mensagem por id cliente */
    public static function verMensagensPorIdCleinte($id_cliente, $id_prestador)
    {
        $show = self::getInstance()->query("SELECT *FROM mensagens AS SMS 
        INNER JOIN clientes AS CL ON SMS.id_cliente = CL.idcliente
        INNER JOIN prestador AS PT ON SMS.id_prestador = PT.idprestador
        WHERE SMS.id_cliente = '$id_cliente' AND SMS.id_prestador = '$id_prestador'
        ");
        return $show->fetchAll();
    }
    public static function verMensagensPorIdPrestador($id_cliente, $id_prestador)
    {
        $show = self::getInstance()->query("SELECT *FROM mensagens AS SMS 
        INNER JOIN clientes AS CL ON SMS.id_cliente = CL.idcliente
        INNER JOIN prestador AS PT ON SMS.id_prestador = PT.idprestador
        WHERE SMS.id_cliente = '$id_cliente' AND SMS.id_prestador = '$id_prestador'
        ");
        return $show->fetchAll();
    }


    /* Ver mensagem por id cliente e prestador [CONVERSA] */
    public static function verConversas($id_cliente, $id_prestador)
    {
        $show = self::getInstance()->query("SELECT *FROM mensagens AS SMS 
        INNER JOIN clientes AS CL ON SMS.id_cliente = CL.idcliente
        INNER JOIN prestador AS PT ON SMS.id_prestador = PT.idprestador
        WHERE SMS.id_cliente = '$id_cliente' AND SMS.id_prestador = '$id_prestador'
        ");
        return $show->fetchAll();
    }

    public static function sent($texto, $id_prestador, $id_cliente, $from)
    {
        $sent = self::getInstance()->prepare("INSERT INTO mensagens (mensagem_texto, id_prestador, id_cliente, mensagem_from)
        VALUES(?,?,?,?)");
        $sent->bindValue(1, $texto);
        $sent->bindValue(2, $id_prestador);
        $sent->bindValue(3, $id_cliente);
        $sent->bindValue(4, $from);

        if ($sent->execute()) {
            return ['ok'];
        } else {
            return ['falha'];
        }
    }

    /* VER MENSAGEM POR ID CLIENTE */
    public static function verMensagem($id_cliente)
    {
        $sms = self::getInstance()->query("SELECT *FROM mensagens as msg
        INNER JOIN clientes AS CL ON msg.id_cliente = CL.idcliente
        INNER JOIN prestador AS PT ON msg.id_prestador = PT.idprestador
        WHERE msg.id_cliente = '$id_cliente'
        GROUP BY msg.id_prestador HAVING COUNT(msg.id_prestador)>0
        ");
        return $sms->fetchAll();
    }
    
    /* VER MENSAGEM POR ID CLIENTE */
    public static function verMensagem_2($id_prestador)
    {
        $sms = self::getInstance()->query("SELECT *FROM mensagens as msg
        INNER JOIN clientes AS CL ON msg.id_cliente = CL.idcliente
        INNER JOIN prestador AS PT ON msg.id_prestador = PT.idprestador
        WHERE msg.id_prestador = '$id_prestador'
        GROUP BY msg.id_prestador HAVING COUNT(msg.id_prestador)>0
        ");
        return $sms->fetchAll();
    }
}
