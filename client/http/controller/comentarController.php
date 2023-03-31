<?php

namespace Http\controller;

use Http\model\comentar as comentario;

class comentarController
{
    #comentar
    public static function comentar($comentario, $id_post, $id_cliente)
    {
        return comentario::comentar($comentario, $id_post, $id_cliente);
    }

    #ver 
    public static function ver($id_post)
    {
        return comentario::ver($id_post);
    }
}
