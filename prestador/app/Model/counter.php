<?php

namespace App\Model;

use App\Model\Conexao as ligar;

class counter
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* Conta todos os registro */

    public static function counters()
    {
        // posts
        $post = self::getInstance()->query("SELECT 