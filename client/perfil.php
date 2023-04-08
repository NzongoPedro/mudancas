<?php

require './config.php';
require '../prestador/vendor/autoload.php';
require './vendor/autoload.php';

use App\Controller\prestadoresController as prestatador;
use Http\controller\mensagensController as sms;

$prestador = prestatador::get();
$mensagem = '';
$listaMensagem = sms::verListadeMensagens($id_cliente);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= ROUTE ?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ROUTE ?>plugins/aos/aos.css">
    <link rel="stylesheet" href="<?= ROUTE ?>public/css/style.css">
    <link rel="stylesheet" href="<?= ROUTE ?>plugins/bootstarp-icon/bootstrap-icons.css">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>Perfil</title>
</head>

<body class="bg-secondary">
    <!-- MENU NAVBAR -->
    <?php require './components/header.php'; ?>
    <!-- FIM MENU NAVBAR -->

    <!-- PERFIL -->
    <br>
    <section class="container mt-5 bg-light p-2 oculto">
        <div class="row mt-2">
            <!-- Menu esquerda -->
            <div class="col-4">
                <div class="card border-0 rounded-0 bg-transparent">
                    <div class="card-title">
                        Mensagens
                    </div>
                    <ul class="list-group rounded-0">
                        <?php
                        foreach ($listaMensagem as $sms) { ?>
                            <li class="list-group-item">
                                <a href="#!" class="nav-link p2" onclick="verMensagens(<?= $id_cliente ?>, <?= $sms->idprestador ?>)">
                                    <?= $sms->prestador_nome ?>
                                    <!--  <span class="badge bg-primary rounded-pill float-end">14</span> -->
                                </a>
                            </li>

                        <?php } ?>

                    </ul>
                </div>
            </div>

            <!-- menu do meio -->
            <div class="col-5">
                <div class="card border-0">
                    <div class="card-body bg-light">
                        <div class="card-title">
                            <h5>Conversas</h5>
                        </div>

                        <form action="" class="form-mensagem">
                            <div class="div-mensagem bg-white">
                                <?php
                                if (isset($_GET['prestador'])) {
                                    $id_prestador = filter_input(INPUT_GET, 'prestador', FILTER_SANITIZE_NUMBER_INT);
                                    $nomePrestador = prestatador::getAll($id_prestador);
                                    $conversas = sms::conversas($id_cliente, $id_prestador); ?>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <div class="">
                                                    <img src="" alt="">
                                                    <h5 class="text-muted"><?= $nomePrestador->prestador_nome ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($conversas as $coversa) { ?>
                                        <?php
                                        if ($coversa->mensagem_from == 'cliente') : ?>
                                            <div class="card bg-transparent border-0 mb-0" style="border-radius: 30px; width:25rem; margin-left:30% !important;">
                                                <div class="card-body">
                                                    <div class="alert alert-primary shadow-sm mb-1">
                                                        <?= $coversa->mensagem_texto ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="card bg-transparent border-0 mb-0" style="border-radius: 30px; width:25rem;">
                                                <div class="card-body">
                                                    <div class="alert alert-secondary shadow-sm mb-1">
                                                        <?= $coversa->mensagem_texto ?>
                                                    </div>
                                                </div>
                                            </div>
                                <?php endif;
                                    }
                                }
                                ?>
                            </div>
                            <div class="alert alert-secondary border-0">
                                <div class="row w-100">
                                    <div class="col-10">
                                        <input type="text" name="mensagem" class="form-control form-control-lg ic" placeholder="Escreva a mesnsagem aqui..." required>
                                    </div>
                                    <!--   <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-0">
                                            <i class="bi bi-image"></i>
                                        </button>
                                    </div> -->
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            enviar
                                        </button>
                                        <input type="hidden" name="from" value="cliente">
                                        <?php if (!isset($id_prestador)) {
                                            $id_prestador = '';
                                        } ?>
                                        <input type="hidden" name="id-cliente" value="<?= $id_cliente ?>">
                                        <input type="hidden" name="id-prestador" class="id-prestador" value="<?= $id_prestador ?>">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ROUTE ?>plugins/aos/aos.js"></script>
    <script>
        AOS.init()
    </script>

    <script>
        const verMensagens = (id_cliente, id_prestador) => {
            let div_mensagem = document.querySelector('.div-mensagem')
            div_mensagem.classList.remove('d-none')
            document.querySelector('.id-prestador').setAttribute('value', id_prestador)

            payload = new FormData()
            payload.append('acao', 'ver-mensagens')
            payload.append('id-cliente', id_cliente)
            payload.append('id-prestador', id_prestador)

            setInterval(() => {
                fetch('./requests.php', {
                        method: 'POST',
                        body: payload
                    })
                    .then(res => res.text())
                    .then(response => {
                        div_mensagem.innerHTML = response
                    })
            }, 1500);

        }

        //reponder mensgame
        const enviarMensagem = () => {

            const formMensagem = document.querySelector('.form-mensagem')
            formMensagem.addEventListener('submit', (e, payload) => {
                e.preventDefault();
                payload = new FormData(formMensagem)
                payload.append('acao', 'enviar-mensagem')
                /* ADD AJAX FOR HTTP REQUEST ASYNC */
                fetch('./requests.php', {
                    method: 'POST',
                    body: payload
                })
                formMensagem.reset()
            })
        }

        enviarMensagem();
    </script>

    <script>
        if (<?= $estado_conta ?> == '0') {
            document.querySelector('.oculto')
                .innerHTML =
                `
                <div class="card alert-danger alert">
                <div class="card-body lead">
                    Seja Bem-Vindo a Plataforma Mudança, que te ajudará a encontrar, contratar ou oferecer serviços de mudanças.
                <br>  Mas para isso, a sua conta precisa estar activada, aguarda enquanto verificamos a veracidade dos seus dados fornecido no processo de registro.
                    Receberás um E-mail de feedback. Fique atendo na sua caixa de entrada.
                    </div>
                </div>
       `
        }
    </script>
</body>

</html>