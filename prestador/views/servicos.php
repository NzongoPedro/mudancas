<?php
require_once '../config.php';
require_once '../checkLogin.php';

use App\Controller\servicosController as Servico;

$servicos = Servico::mostraServico($id_prestador);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Publicações
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
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./post.php">Serviços</a>
                <!-- User -->
                <?php require '../templates/topPerfil.php'; ?>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <?php require '../templates/cardState.php'; ?>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--7">
            <!-- Table of posts -->
            <!-- Dark table -->
            <div class="row mt-5">
                <div class="col">
                    <div class="card bg-default shadow p-3">
                        <div class="row">
                            <div class="col-7">
                                <div class="container">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <?php
                                            // Exibe a controller de servicos
                                            foreach ($servicos as $servico) : ?>
                                                <div class="card-title">
                                                    <div class="text-right">
                                                        <a class="btn btn-sm text-danger">
                                                            <span>
                                                                eliminar
                                                                <i class="ni ni-fat-delete"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <h3><?= $servico->servico_designacao ?></h3>
                                                </div>
                                                <div class="card-text mb-2">
                                                    <?= $servico->servico_descricao ?>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="container">
                                    <div class="card shadow-sm b-2 bg-transparent">
                                        <h3 class="text-light mb-3 text-right mr-2">Adicionar Serviços</h3>
                                        <form action="" class="form-servico">
                                            <div class="form-group mb-3">
                                                <input type="text" name="nome-servico" class="form-control bg-transparent color-white rounded-0" placeholder="Escreva o nome do serviço">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control bg-transparent rounded-0" name="descricao-servico" rows="3" placeholder="Escreva uma descrição para este serviço..."></textarea>
                                            </div>
                                            <div class="responseText"></div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn rounded-0 btn-primary btn-block btn-lg">
                                                    Adicionar
                                                </button>
                                            </div>
                                            <input type="hidden" name="id-prestador" value="<?= $prestador->idprestador ?>">
                                        </form>
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
    </div>

    <?php require '../components/modalNewPost.php'; ?>
    <!--   Core   -->
    <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script>
        /* // Store prestadores */

        var url = location.href; //pega endereço que esta no navegador
        url = url.split("/"); //quebra o endeço de acordo com a / (barra)

        let urll = `http://${url[2]}/mudancas/prestador/requestAjax.php`

        const store = async () => {
            form = document.querySelector('.form-servico')
            form.addEventListener('submit', (e, payload) => {
                e.preventDefault();
                payload = new FormData(form)

                payload.append('acao', 'store-servico')

                resposta = document.querySelector('.responseText')

                /* ADD AJAX FOR HTTP REQUEST ASYNC */
                fetch(urll, {
                        method: 'POST',
                        body: payload
                    })
                    .then(res => res.json())
                    .then(response => {
                        if (response.status == 'sucesso') {
                            resposta.innerHTML = `<div class="alert alert-success" role="alert"> ${response.msg}</div>`
                            setTimeout(() => {
                                location.reload()
                            }, 2500);
                        } else {
                            resposta.innerHTML = `<div class = "alert alert-danger"> ${response.msg}</div>`
                        }
                    })
                    .catch(e => {
                        resposta.innerHTML = e
                    })
            })
        }

        store()
    </script>
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
</body>

</html>