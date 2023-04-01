<?php
require './config.php';
require '../prestador/vendor/autoload.php';

use App\Controller\prestadoresController as prestatador;

$prestador = prestatador::get();

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
    <section class="container mt-5 bg-light p-2">
        <div class="row mt-2">
            <!-- Menu esquerda -->
            <div class="col-3">
                <div class="card border-0 rounded-0 bg-transparent">
                    <div class="card-title">
                        Mensagens
                    </div>
                    <ul class="list-group rounded-0">
                        <li class="list-group-item">
                            <a href="#!" class="nav-link" onclick="verMensagens(<?= $id_cliente ?>)">
                                Nome prestador
                                <span class="badge bg-primary rounded-pill float-end">14</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="./perfil.php?message" class="nav-link">
                                Nome prestador
                                <span class="badge bg-primary rounded-pill float-end">14</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="./perfil.php?message" class="nav-link">
                                Nome prestador
                                <span class="badge bg-primary rounded-pill float-end">14</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- menu do meio -->
            <div class="col-6">
                <div class="card border-0 d-none div-mensagem">
                    <div class="card-body bg-light">
                        <div class="card-title">
                            <h5>Conversas</h5>
                        </div>
                        <div role="alert" aria-live="assertive" aria-atomic="true" class="mb-2 border-0 toast shadow-none show w-100" data-bs-autohide="false">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Nome Clente</strong>
                                <small>data</small>
                            </div>
                            <div class="toast-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam consequatur odit autem possimus ipsa perspiciatis beatae mollitia fugiat minus, quis eos voluptatum dolore cumque quas error. Corporis magnam error explicabo?
                            </div>
                        </div>
                        <div role="alert" aria-live="assertive" aria-atomic="true" class="mb-2 border-0 toast shadow-none show w-100" data-bs-autohide="false">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Nome Prestador</strong>
                                <small>data</small>
                            </div>
                            <div class="toast-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam consequatur odit autem possimus ipsa perspiciatis beatae mollitia fugiat minus, quis eos voluptatum dolore cumque quas error. Corporis magnam error explicabo?
                            </div>
                        </div>
                        <div role="alert" aria-live="assertive" aria-atomic="true" class="mb-2 border-0 toast shadow-none show w-100" data-bs-autohide="false">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Nome Clente</strong>
                                <small>data</small>
                            </div>
                            <div class="toast-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam consequatur odit autem possimus ipsa perspiciatis beatae mollitia fugiat minus, quis eos voluptatum dolore cumque quas error. Corporis magnam error explicabo?
                            </div>
                        </div>

                        <div class="alert alert-secondary border-0">
                            <form action="" class="comentar-post">
                                <div class="row w-100">
                                    <div class="col-10">
                                        <input type="text" name="mensagem" class="form-control form-control-lg ic" placeholder="Escreva a mesnsagem aqui..." required>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-0">
                                            <i class="bi bi-image"></i>
                                        </button>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="bi bi-send-fill"></i>
                                        </button>
                                        <input type="hidden" name="id-cliente" value="<?= $id_cliente ?>">
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
        const verMensagens = (id_cliente) => {
            let div_mensagem = document.querySelector('.div-mensagem')
            div_mensagem.classList.remove('d-none')

            setInterval(() => {
                payload = new FormData()
                payload.append('acao', 'ver-mensagens')
                payload.append('id-cliente', id_cliente)

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
    </script>
</body>

</html>