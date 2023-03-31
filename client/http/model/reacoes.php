<?php

namespace Http\model;

use Http\model\Conexao as ligar;


class reacoes
{

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* Reagir */

    public static function reagir($id_post, $id_clinte)
    {
        // verifica se este cliente já reagiu a esta publicação

        $check = self::getInstance()->query("SELECT * FROM reacao_publicacao WHERE id_cliente = '$id_clinte'");
        if ($check->rowCount() <= 0) { // se não houver, reage a publicação
            $reage = self::getInstance()->prepare("INSERT INTO reacao_publicacao (reacao_qtd, id_publicao, id_cliente)
            VALUES(?,?,?)");
            $reage->bindValue(1, 1);
            $reage->bindValue(2, $id_post);
            $reage->bindValue(3, $id_clinte);
            if ($reage->execute()) {
                return ['ok'];
            }
        } else { // se houver, remove a reação
            if (self::getInstance()->query("DELETE FROM reacao_publicacao WHERE id_cliente = '$id_clinte' AND id_publicao = '$id_post'")) {
                return ['ok'];
            }
        }
    }

    #contar publicações
    public static function contarReacoes($id_post)
    {
        return self::getInstance()->query("SELECT * FROM reacao_publicacao WHERE id_publicao = '$id_post'")->rowCount();
    }
}
