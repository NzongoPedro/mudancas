<?php
require_once '../config.php';
require_once '../checkLogin.php';

use App\Controller\publicacoesController as Publicacao;

$publicacoes = Publicacao::mostraPublicacao($id_prestador);
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
    <!--  <style>
        .form-upload {
            background: #333;
            display: block;
            margin: 0 auto;
            padding: 20px;
            text-align: center
        }

        .input-personalizado {
            cursor: pointer;
        }

        .imagem {
            max-width: 100%;
        }

        .input-file {
            display: none;
        }
    </style> -->
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
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./post.php">Publicações</a>
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
                <div class="dcol">
                    <div class="card bg-default shadow w-100">
                        <div class="card-header bg-transparent border-0">
                            <div class="text-right ">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <button type="button" class="btn bg-none bg-transparent text-white" data-toggle="modal" data-target="#modalNewPost">
                                        <i class="ni ni-fat-add"></i>
                                    </button>
                                </div>
                            </div>
                            <h3 class="text-white mb-3">Publicações antigas</h3>
                            <div class="row">
                                <?php
                                foreach ($publicacoes as $post) : ?>
                                    <div class="col-lg-12 w-100 mb-3 id<?= $post->idpublicacao ?>">
                                        <div class="row bg-white rounded">
                                            <div class="col-7 w-100">
                                                <div class="border-0">
                                                    <?php
                                                    if (explode('.', $post->publicacao_arquivo)[1] != 'mp4') { ?>
                                                        <div class="card-img">
                                                            <img class="image-responsive w-100" src="<?= ROUTE ?>assets/img/post/<?= $post->publicacao_arquivo ?>" style="object-fit:cover; object-position:center;">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="p-2">
                                                            <video class="video w-100" controls poster="<?= ROUTE ?>assets/img/post/<?= $post->publicacao_arquivo ?>">
                                                                <source src="<?= ROUTE ?>assets/img/post/<?= $post->publicacao_arquivo ?>" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    <?php }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class=" col-5 w-100">
                                                <div class="text-right mt-3">
                                                    <div class="dropdown">
                                                        <a class="btn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#" onclick="mostrarpostModal(<?= $post->idpublicacao ?>)" data-toggle="modal" data-target="#modalNewPost">
                                                                <i class="ni ni-ruler-pencil mr-3"></i>
                                                                Editar</a>
                                                            <a href="#" onclick="eliminarPost(<?= $post->idpublicacao ?>)" class="dropdown-item">
                                                                <i class="ni ni-fat-remove mr-3"></i>
                                                                Elimitar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border-0">
                                                    <div class="fcard-body">
                                                        <h3 class="card-title mt-0"><?= $post->publicacao_titulo ?></h3>
                                                        <p class="card-text"><?= $post->publicacao_texto ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach ?>
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

            <?php require '../components/modalNewPost.php'; ?>
            <!--   Core   -->
            <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
            <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <!--   Optional JS   -->
            <script>
                /* // Sent publicações */

                var url = location.href; //pega endereço que esta no navegador
                url = url.split("/"); //quebra o endeço de acordo com a / (barra)

                let urll = `http://${url[2]}/mudancas/prestador/requestAjax.php`

                const post = async () => {
                    form = document.querySelector('.form-post')
                    form.addEventListener('submit', (e, payload) => {
                        e.preventDefault();
                        payload = new FormData(form)

                        payload.append('acao', 'post')

                        resposta = document.querySelector('.responseText')

                        /* ADD AJAX FOR HTTP REQUEST ASYNC */
                        fetch(urll, {
                                method: 'POST',
                                body: payload
                            })
                            .then(res => res.json())
                            .then(response => {
                                if (response.status == 'sucesso') {
                                    resposta.innerHTML =
                                        `<div class="alert alert-success">
                    ${response.msg}
                    </div>`
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1500);

                                } else {
                                    resposta.innerHTML =
                                        `<div class = "alert alert-danger">
                  ${response.msg}
                    </div>`
                                }
                            })
                            .catch(e => {
                                resposta.innerHTML = e
                            })
                    })
                }

                post()

                function eliminarPost(id_post) {
                    /* ADD AJAX FOR HTTP REQUEST ASYNC */
                    dados = new FormData();
                    dados.append('acao', 'eliminarPost')
                    dados.append('idpublicacao', id_post)
                    fetch(urll, {
                            method: 'POST',
                            body: dados
                        })
                        .then(res => res.json())
                        .then(response => {
                            if (response.status == 'sucesso') {
                                document.querySelector(`.id${id_post}`).style.display = "none"
                                alert(response.msg);
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            } else {
                                alert(response.msg);
                            }
                        })
                }

                function mostrarpostModal(id_post) {
                    /* mostrar os dados da bd na modal */
                    dados = new FormData();
                    dados.append('acao', 'editarPostModal')
                    dados.append('idpublicacao', id_post)
                    fetch(urll, {
                            method: 'POST',
                            body: dados
                        })
                        .then(res => res.json())
                        .then(response => {

                            document.querySelector("#modalNewPostLabel").innerHTML = "Editar Publicações";
                            document.querySelector(".titulo-post").setAttribute('value', response[0].publicacao_titulo)
                            document.querySelector(".foto-post").classList.add('d-none')
                            document.querySelector(".texto-post").innerHTML = response[0].publicacao_texto
                            document.querySelector(".button-post").innerHTML = "Editar"
                            document.querySelector(".id-post").setAttribute('value', id_post)
                        })

                }
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

            <script>
                $(document).ready(function() {
                    // $('#modalNewPost').modal('show')
                })
            </script>
</body>

</html>