<?php

namespace Http\controller;

use Http\model\contratos as contrato;

class contratoController
{
    public static function enviarContrato($id_cliente, $id_prestador, $id_servico, $endereco_atual, $endereco_destino)
    {
        return contrato::enviarContrato($id_cliente, $id_prestador, $id_servico, $endereco_atual, $endereco_destino);
    }

    public static function show($id_prestador)
    {
        return contrato::show($id_prestador);
    }
}
