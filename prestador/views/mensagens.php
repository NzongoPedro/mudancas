<?php
require_once '../config.php';
require '../../client/vendor/autoload.php';
require_once '../checkLogin.php';

use App\Controller\mensagensController as sms;
use Http\controller\mensagensController as msg;
use Http\model\client;

$mensagens = sms::verMensagem($id_prestador);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Mensagens
    </title>
    <!-- Favicon -->
    <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />

</head>

<body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="../index.html">
                <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Navigation -->
                <?php require '../templates/theVerticalBar.php'; ?>
                <!-- Divider -->
            </div>
        </div>
    </nav>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./profile.php">Meu perfil</a>
                <!-- User -->
                <?php require '../templates/topPerfil.php'; ?>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(<?= ROUTE ?>assets/img/prestador/<?= $prestador->prestador_foto ?>); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <!-- Page content -->
            <br>
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <br><br><br>
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="float-right">
                                    <button type="button" class="btn btn-danger rounded-5" style="border-radius: 50px;">
                                        <i class="ni ni-chat-round"></i>
                                        <span class="text-white">10</span>
                                    </button>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Mensagens</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <ul class="list-group">
                                            <?php
                                            foreach ($mensagens as $sms) {
                                                $cliente = $sms->id_cliente;
                                            ?>
                                                <li class="list-group-item">
                                                    <a href="#!" class="nav-link" onclick="verMensagens(<?= $sms->id_cliente ?>, <?= $id_prestador ?>)"><?= $sms->cliente_nome ?></a>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class=" col-8">
                                        <form class="form-mensagem">
                                            <div class="div-mensagem bg-white">
                                                Clique num cliente para iniciar a conversa
                                            </div>
                                            <div class="form-group mt-3">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <textarea name="mensagem" cols="30" rows="1" class="rounded-5 form-control form-control-lg rounded-0" placeholder="escreva a sua mensagem ..."></textarea>
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-lg rounded-5 btn-lg btn-primary">Enviar</button>
                                                    </div>
                                                    <input type="hidden" name="from" value="prestador">
                                                    <input type="hidden" name="id-cliente" value="<?= $cliente ?>">
                                                    <input type="hidden" name="id-prestador" value="<?= $id_prestador ?>">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <!-- REQUIRE MODAL -->
    <?php require '../components/modalAddFoto.php'; ?>
    <?php require '../components/modalMensagem.php'; ?>

    <!--   Core   -->
    <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->
    <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>

    <script>
        var url = location.href; //pega endereço que esta no navegador
        url = url.split("/"); //quebra o endeço de acordo com a / (barra)

        let urll = `http://${url[2]}/mudancas/prestador/requestAjax.php`
        let urll_2 = `http://${url[2]}/mudancas/client/requests.php`
        //reponder mensgame
        const enviarMensagem = () => {

            const formMensagem = document.querySelector('.form-mensagem')
            formMensagem.addEventListener('submit', (e, payload) => {
                e.preventDefault();
                payload = new FormData(formMensagem)
                payload.append('acao', 'enviar-mensagem')
                /* ADD AJAX FOR HTTP REQUEST ASYNC */
                fetch(urll_2, {
                    method: 'POST',
                    body: payload
                })
                formMensagem.reset()
            })
        }

        const verMensagens = (id_cliente, id_prestador) => {
            let div_mensagem = document.querySelector('.div-mensagem')
            div_mensagem.classList.remove('d-none')

            payload = new FormData()
            payload.append('acao', 'ver-mensagens-2')
            payload.append('id-cliente', id_cliente)
            payload.append('id-prestador', id_prestador)

            setInterval(() => {
                fetch(urll_2, {
                        method: 'POST',
                        body: payload
                    })
                    .then(res => res.text())
                    .then(response => {
                        div_mensagem.innerHTML = response
                    })
            }, 1500);

        }
        enviarMensagem();
    </script>
</body>

</html>