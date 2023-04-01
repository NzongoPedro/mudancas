<?php

namespace Http\controller;

use Http\model\mensagens as sms;

class mensagensController
{
    public static function verMensagensPorIdCleinte($id_cliente)
    {
        return sms::verMensagensPorIdCleinte($id_cliente);
    }
}
