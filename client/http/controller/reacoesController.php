<?php

namespace Http\controller;

use Http\model\reacoes as reagir;

class reacoesController
{
    public static function reagir($id_post, $id_clinte)
    {
        return reagir::reagir($id_post, $id_clinte);
    }

    #contar publicações
    public static function contarReacoes($id_post)
    {
        return reagir::contarReacoes($id_post);
    }
}
