<?php


require_once './vendor/autoload.php';

use Http\controller\clienteController as cliente;
use Http\controller\reacoesController as reagir;
use Http\controller\comentarController as comment;
use Http\controller\mensagensController as sms;
use Http\controller\contratoController as contrato;

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

        case 'enviar-mensagem':
            $id_cliente = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
            $id_prestador = filter_input(INPUT_POST, 'id-prestador', FILTER_SANITIZE_NUMBER_INT);
            $texto = addslashes(htmlspecialchars(filter_input(INPUT_POST, 'mensagem')));
            $from = filter_input(INPUT_POST, 'from');
            echo sms::sent($texto, $id_prestador, $id_cliente, $from);
            break;

        case 'ver-mensagens-2':
            $id_cliente = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
            $id_prestador = filter_input(INPUT_POST, 'id-prestador', FILTER_SANITIZE_NUMBER_INT);
            $sms = sms::verMensagensPorPrestador($id_cliente, $id_prestador);
            echo '<div class="card border-0">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="">
                                <img src="" alt="">
                                <h5 class="text-muted">' . $sms[0]->cliente_nome . '</h5>
                            </div>
                        </div>
                    </div>
               
                </div>';
            foreach ($sms as $coversa) {
                if ($coversa->mensagem_from == 'cliente') :
                    echo '<div class="card bg-transparent border-0 mb-0" style="border-radius: 30px; margin-left:30% !important;">
                        <div class="card-body">
                            <div class="alert alert-secondary shadow-sm mb-1">
                                ' . $coversa->mensagem_texto . '
                            </div>
                        </div>
                    </div>';
                else :
                    echo '<div class="card bg-transparent border-0 mb-0" style="border-radius: 30px; width:25rem;">
                        <div class="card-body">
                            <div class="alert alert-primary shadow-sm mb-1">
                                ' . $coversa->mensagem_texto . '
                            </div>
                        </div>
                    </div>';
                endif;
            }
            break;

        case 'ver-mensagens':
            $id_cliente = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
            $id_prestador = filter_input(INPUT_POST, 'id-prestador', FILTER_SANITIZE_NUMBER_INT);
            $sms = sms::verMensagensPorIdCleinte($id_cliente, $id_prestador);
            echo '<div class="card border-0">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="">
                                <img src="" alt="">
                                <h5 class="text-muted">' . $sms[0]->prestador_nome . '</h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>';
            foreach ($sms as $coversa) {
                if ($coversa->mensagem_from == 'cliente') :
                    echo '<div class="card bg-transparent border-0 mb-0" style="border-radius: 30px; margin-left:30% !important;">
                        <div class="card-body">
                            <div class="alert alert-primary shadow-sm mb-1">
                                ' . $coversa->mensagem_texto . '
                            </div>
                        </div>
                    </div>';
                else :
                    echo '<div class="card bg-transparent border-0 mb-0 float-left" style="border-radius: 30px; width:25rem;">
                        <div class="card-body">
                            <div class="alert alert-secondary shadow-sm mb-1">
                                ' . $coversa->mensagem_texto . '
                            </div>
                        </div>
                    </div>';
                endif;
            }
            break;

        case 'solicitar-contrato':
            $id_cliente = filter_input(INPUT_POST, 'id-cliente', FILTER_SANITIZE_NUMBER_INT);
            $id_prestador = filter_input(INPUT_POST, 'id-prestador', FILTER_SANITIZE_NUMBER_INT);
            $id_servico = filter_input(INPUT_POST, 'id-servico', FILTER_SANITIZE_NUMBER_INT);
            $endereco_atual = filter_input(INPUT_POST, 'endereco-atual');
            $endereco_destino = filter_input(INPUT_POST, 'endereco-destino');
            print json_encode(contrato::enviarContrato($id_cliente, $id_prestador, $id_servico, $endereco_atual, $endereco_destino));
            break;
        default:

            break;
    }
}
