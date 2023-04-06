<?php

namespace App\Controller;

use App\Model\mensagens as sms;

class mensagensController
{
    public static function verMensagem($id_prestador)
    {
        return sms::verMensagem($id_prestador);
    }
}
