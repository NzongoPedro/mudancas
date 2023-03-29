<?php

namespace App\Controller;

use App\Model\counter as contar;

class counterController
{
    // Get All Adress

    public static function count()
    {
        return contar::counters();
    }
}
