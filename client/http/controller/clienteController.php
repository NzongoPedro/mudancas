<?php

namespace Http\controller;

use Http\model\client as cliente;

class clienteController
{
    # create
    public static function create($cliente_nome, $cliente_telefone, $cliente_whatsapp, $cliente_email, $cliente_senha, $cliente_identificacao, $cliente_localizacao)
    {
        return cliente::create($cliente_nome, $cliente_telefone, $cliente_whatsapp, $cliente_email, $cliente_senha, $cliente_identificacao, $cliente_localizacao);
    }

    /* show */
    public static function show($id_cliente)
    {
        return cliente::show($id_cliente);
    }

    # cliente 
    public static function login($cliente_email, $cliente_senha)
    {
        return cliente::login($cliente_email, $cliente_senha);
    }
}
