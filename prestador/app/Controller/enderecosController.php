<?php

namespace App\Controller;

use App\Model\enderecos as endereco;

class enderecosController
{
    // Get All Adress

    public static function getAllAdress()
    {
        return endereco::getAddress();
    }
}
