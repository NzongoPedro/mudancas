<?php


require_once './vendor/autoload.php';

use Http\controller\clienteController as cliente;

if (isset($_POST['acao'])) {

    $acao = filter_input(INPUT_POST, 'acao');

    switch ($acao) {
        case 'create-cliente':

            $cliente_nome = filter_input(INPUT_POST, 'nome-cliente');
            $cliente_telefone = filter_input(INPUT_POST, 'telefone-cliente', FILTER_SANITIZE_NUMBER_INT);
            $cliente_whatsapp = filter_input(INPUT_POST, 'whatsapp-cliente', FILTER_SANITIZE_NUMBER_INT);
            $cliente_email = filter_input(INPUT_POST, 'email-cliente', FILTER_SANITIZE_EMAIL);
            $cliente_senha = filter_input(INPUT_POST, 'senha-cliente');
            $cliente_identificacao = filter_input(INPUT_POST, 'bi-cliente');
            $cliente_localizacao = filter_input(INPUT_POST, 'endereco-cliente');

            print json_encode(cliente::create($cliente_nome, $cliente_telefone, $cliente_whatsapp, $cliente_email, $cliente_senha, $cliente_identificacao, $cliente_localizacao));
            break;

        case 'login-cliente':
            $cliente_email = filter_input(INPUT_POST, 'email-cliente', FILTER_SANITIZE_EMAIL);
            $cliente_senha = md5(filter_input(INPUT_POST, 'senha-cliente'));

            print json_encode(cliente::login($cliente_email, $cliente_senha));
            break;

        default:
            # code...
            break;
    }
}
