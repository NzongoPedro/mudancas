<?php

namespace App\Controller;

use App\Model\servicos as Servicos;

class servicosController
{

    /* STORE */

    public static function  store($designacao, $descricao, $id_prestador)
    {
        return Servicos::store($designacao, $descricao, $id_prestador);
    }

    /* Mostra o serviço no perfil do prestador */
    public static function mostraServico($id_prestador)
    {
        $servicos = Servicos::mostraServicoPrestador($id_prestador); // recupera a model de serviços
        return $servicos; // retirna o serviço e o exibe no perfil do prestador (VIEWS)

    }
}
