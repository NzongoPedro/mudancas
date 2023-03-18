<?php

namespace App\Model;

use App\Model\Conexao as ligar;

class publicacoes
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    public static function sent($titulo, $foto, $content)
    {
        
    }
}
