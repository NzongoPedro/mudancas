<?php

if (!isset($_SESSION['id-prestador'])) {
    header('location: ' . ROUTE . 'login.php');
}

$id_prestador = $_SESSION['id-prestador'];

require '../vendor/autoload.php';

use App\Controller\prestadoresController as perfilPrestador;

$prestador = perfilPrestador::getAll($id_prestador);
