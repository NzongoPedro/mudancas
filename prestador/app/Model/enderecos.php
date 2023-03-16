<?php

namespace App\Model;

use App\Model\Conexao as ligar;

class enderecos
{

    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* GET ALL ADDRESS */
    public static function getAddress()
    {

        $query = self::getInstance()->query("SELECT *FROM enderecos_prestador ORDER BY endereco_provincia");
        $rowData = $query->fetchAll();

        return $rowData;
    }
}
