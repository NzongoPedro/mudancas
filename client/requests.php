<?php


require_once './vendor/autoload.php';

use Http\controller\clienteController as cliente;
use Http\controller\reacoesController as reagir;
use Http\controller\comentarController as comment;

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

        case 'reagir-post':
            $id_post = filter_input(INPUT_POST, 'id-post', FILTER_SANITIZE_NUMBER_INT);
            $id_clinte = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
            print json_encode(reagir::reagir($id_post, $id_clinte));
            break;

        case 'comentar-post':
            $id_post = filter_input(INPUT_POST, 'id-post', FILTER_SANITIZE_NUMBER_INT);
            $id_cliente = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
            $comentario = addslashes(htmlspecialchars(filter_input(INPUT_POST, 'comentario')));
            print json_encode(comment::comentar($comentario, $id_post, $id_cliente));
            break;

        case 'ver-post':
            $id_post = filter_input(INPUT_POST, 'id-post', FILTER_SANITIZE_NUMBER_INT);
            $coment = (comment::ver($id_post));
            foreach ($coment as $key) {
                echo
                '
                      <div role="alert" aria-live="assertive" aria-atomic="true" class="mb-2 border-0 toast shadow-none show w-100" data-bs-autohide="false">
                        <div class="toast-header">
                            <img src="..." class="rounded me-2" alt="...">
                            <strong class="me-auto">' . $key->cliente_nome . '</strong>
                            <small>' . $key->comentario_data . '</small>
                        </div>
                        <div class="toast-body">
                           ' . $key->comentario_texto . '
                        </div>
                    </div>
                  ';
            }
            break;

        default:
            # code...
            break;
    }
}
