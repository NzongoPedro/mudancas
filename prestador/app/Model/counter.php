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
        $post = self::getInstance()->query("SELECT *FROM publicacoes");
        // serviços
        $servicos = self::getInstance()->query("SELECT *FROM servicos");
        // contratos
        $contratos = self::getInstance()->query("SELECT *FROM contratos");
        // mensagens
        $mensagens = self::getInstance()->query("SELECT *FROM mensagens");

        return [
            "post" => $post->rowCount(),
            "servicos" => $servicos->rowCount(),
            "contratos" => $contratos->rowCount(),
            "mensagens" => $mensagens->rowCount(),
        ];
    }
}
