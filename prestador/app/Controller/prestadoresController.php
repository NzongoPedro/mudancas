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

    /* GET ALL DATA */

    public static function getAll($id_prestador)
    {
        return Prestador::getAllData($id_prestador);
    }

    /* STORE */

    public static function  store($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador)
    {
        return Prestador::storer($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador);
    }

    /* edit personal data */

    public static function editaDadosPessoas($nome_prestador, $email_prestador, $nif_prestador, $id_prestador)
    {
        return Prestador::editarDadosPessoas($nome_prestador, $email_prestador, $nif_prestador, $id_prestador);
    }

    /*ADD FOTO */
    public static function addFoto($foto, $id_prestador){
        return Prestador::addFoto($foto, $id_prestador);
    }

    /* LOGIN */

    public static function login($email_prestador, $senha_prestador)
    {
        return Prestador::login($email_prestador, $senha_prestador);
    }
}
