<?php
session_start();
$_SESSION['user'] = '';
$protocolo = 'http://';
$route = $protocolo . $_SERVER['HTTP_HOST'] . '/' . 'mudancas' . '/client' . '/';
define('ROUTE', $route);
