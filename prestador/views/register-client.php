<?php

require_once '../../client/config.php';

if (isset($_SESSION['id-cliente'])) {
    header('location: ' . ROUTE);
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Registro de Clientes
    </title>
    <!-- Favicon -->
    <link href="../assets/img/brand/favicon.png" rel="icon" required type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="bg-default">
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
            <div class="container px-4">
                <a class="navbar-brand" href="../index.html">
                    <img src="../assets/img/brand/white.png" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="./">
                                    <img src="../assets/img/brand/blue.png">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="./login-client.php">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->

        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-5">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">BEM-VINDO!</h1>
                            <p class="text-lead text-light">Crie uma conta cliente</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-2">
                            <form role="form" enctype="multipart/form-data">
                                <!-- Firs Line OF Data -->
                                <br><br><br>
                                <div class="form-row row">
                                    <div class="form-group col">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                            </div>
                                            <input name="nome-cliente" class="form-control" placeholder="Nome completo" required type="text">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input name="email-cliente" class="form-control" placeholder="E-mail" required type="mail">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fourth Line OF Data -->
                                <div class="form-row row">
                                    <div class="form-group col">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                            </div>
                                            <input name="telefone-cliente" class="form-control" placeholder="Telefone" required type="tel">
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                            </div>
                                            <input name="whatsapp-cliente" class="form-control" placeholder="Whatsapp" required type="tel">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row row">
                                    <div class="form-group col">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input name="bi-cliente" class="form-control" placeholder="Nº de BI" required type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input name="senha-cliente" class="form-control" placeholder="Password" required type="password">
                                        </div>
                                    </div>
                                </div>

                                <!-- Thirth line of data -->
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                                        </div>
                                        <input name="endereco-cliente" class="form-control" placeholder="Bairro, rua, provincia" required type="address">
                                    </div>
                                </div>

                                <div class="row my-2">
                                    <div class="form-group col-12 mb-2">
                                        <label for="#">Carregue o BI frente e verso [PDF]</label>
                                        <br>
                                        <input type="file" name="arquivo-bi" required>
                                    </div>
                                </div>

                                <!-- Last line os data -->
                                <div class="responseText"></div>

                                <div class="text-center mb-2">
                                    <button required type="submit" class="btn btn-primary">Criar conta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2023 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Ivánia </a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Ivania</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Sobre nós</a>
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
        </div>
    </footer>
    </div>
    <!--   Core   -->
    <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script>
        /* // Store prestadores */

        var url = location.href; //pega endereço que esta no navegador
        url = url.split("/"); //quebra o endeço de acordo com a / (barra)

        let urll = `http://${url[2]}/mudancas/client/requests.php`

        const store = async () => {
            form = document.querySelector('form')
            form.addEventListener('submit', (e, payload) => {
                e.preventDefault();
                payload = new FormData(form)

                payload.append('acao', 'create-cliente')

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
                                `<div class="alert alert-success" role="alert">
                    ${response.msg}
                </div>`
                            setTimeout(() => {
                                location.href = "./profile.php"
                            }, 1500);
                        } else {
                            resposta.innerHTML =
                                `<div class = "alert alert-danger" role = "alert" >
                  ${response.msg}
                    </div>`
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