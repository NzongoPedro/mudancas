<?php

namespace Http\controller;

use Http\model\mensagens as sms;

class mensagensController
{
    public static function verMensagensPorPrestador($id_cliente, $id_prestador)
    {
        return sms::verMensagensPorIdPrestador($id_cliente, $id_prestador);
    }
    public static function verMensagensPorIdCleinte($id_cliente, $id_prestador)
    {
        return sms::verMensagensPorIdCleinte($id_cliente, $id_prestador);
    }
    public static function conversas($id_cliente, $id_prestador)
    {
        return sms::verConversas($id_cliente, $id_prestador);
    }

    public static function sent($texto, $id_prestador, $id_cliente, $from)
    {
        return json_encode(sms::sent($texto, $id_prestador, $id_cliente, $from));
    }

    public static function verConversas($id_cliente, $id_prestador)
    {
        return sms::verConversas($id_cliente, $id_prestador);
    }

    public static function verListadeMensagens($id_cliente)
    {
        return sms::verMensagem($id_cliente);
    }
    public static function verListadeMensagens_2($id_prestador)
    {
        return sms::verMensagem_2($id_prestador);
    }
}
