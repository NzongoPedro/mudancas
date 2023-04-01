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
    public static function verMensagensPorIdCleinte($id_cliente)
    {
        $show = self::getInstance()->query("SELECT *FROM mensagens AS SMS 
        INNER JOIN clientes AS CL ON SMS.id_cliente = CL.idcliente
        WHERE SMS.id_cliente = '$id_cliente'
        ");
        return $show->fetchAll();
    }
}
