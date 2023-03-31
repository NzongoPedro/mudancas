<?php

namespace Http\model;

use Http\model\Conexao as ligar;


class comentar
{

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* Comentar */

    public static function comentar($comentario, $id_post, $id_cliente)
    {
        // verifica se este cliente já reagiu a esta publicação

        $comentar = self::getInstance()->prepare("INSERT INTO comentario_publicacao (comentario_texto, id_publicacao, id_cliente)
        VALUES(?,?,?)");
        $comentar->bindValue(1, $comentario);
        $comentar->bindValue(2, $id_post);
        $comentar->bindValue(3, $id_cliente);

        if ($comentar->execute()) {
            return ['ok'];
        }
    }

    /* SHOW */
    public static function ver($id_post)
    {
        $ver = self::getInstance()->query("SELECT *FROM comentario_publicacao as CO 
        INNER JOIN clientes AS CL ON CO.id_cliente = CL.idcliente");
        $row = $ver->fetchAll();
        return $row;
    }
}
