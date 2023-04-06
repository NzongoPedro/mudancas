<?php
session_start();
$protocolo = 'http://';
$route = $protocolo . $_SERVER['HTTP_HOST'] . '/' . 'mudancas' . '/client' . '/';
define('ROUTE', $route);
if (isset($_SESSION['id-cliente'])) {
    $id_cliente = $_SESSION['id-cliente'];
}
