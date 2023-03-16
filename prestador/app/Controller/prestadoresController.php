<?php

namespace App\Controller;

use App\Model\prestadores as Prestador;

class prestadoresController
{
    // Get All typePrestadores

    public static function getTypePrestadores()
    {
        return Prestador::getTypeOfPrestadores();
    }

    /* STORE */

    public static function  store($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador)
    {
        return Prestador::storer($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador);
    }

    /* LOGIN */

    public static function login($email_prestador, $senha_prestador)
    {
        return Prestador::login($email_prestador, $senha_prestador);
    }
}
