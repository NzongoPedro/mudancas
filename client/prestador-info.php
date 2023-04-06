<?php
require '../prestador/vendor/autoload.php';
require_once './config.php';

if (!isset($_SESSION['id-cliente'])) {
    header('location:../prestador/views/login-client.php');
}

use App\Controller\publicacoesController as Publicacao;
use App\Controller\prestadoresController as Prestador;
use App\Controller\servicosController as servicos;
use Http\controller\reacoesController as reacoes;

$id_prestador = ($_GET["id-prestador"]);
$prestador = Prestador::getAll($id_prestador);
$publicacoes = Publicacao::mostraPublicacao($id_prestador);
$servicos = servicos::mostraServico($id_prestador);
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
    <title>Nome Prestador </title>
</head>

<body>
    <!-- MENU NAVBAR -->
    <?php require './components/header.php'; ?>
    <!-- FIM MENU NAVBAR -->
    <!-- Menu infor -->
    <br><br><br>
    <div class="container">
        <section class="mt-2">
            <div class="row">
                <div class="col-2 bg-light">
                    <div class="card">
                        <div class="card-header">
                            publicações
                        </div>
                        <div class="card-body">

                            <?php
                            foreach ($publicacoes as $post) : ?>

                                <a class="nav-link mb-2" href="./prestador-info.php?id-prestador=<?= $id_prestador ?>&idpublicacao=<?= $post->idpublicacao ?>"><?= $post->publicacao_titulo ?>
                                </a>

                            <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-6 bg-light" style="background: url(./storage/image/prestador/2.jp);">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-end">
                                <span class="text-dark"><?= $prestador->prestador_nome ?></span>
                            </div>
                            <div class="icons text-white float-end me-5">
                                <a href="./perfil.php?prestador=<?= $prestador->idprestador ?>" class="text-warning">
                                    <i class="bi bi-chat-dots text-warning me-2"></i>
                                    Mesnsagem
                                </a>

                                <a href="#!" class="text-warning ms-2" title="Contratar">
                                    <i class="bi bi-pencil me-2"></i> Contratar
                                </a>

                            </div>
                        </div>
                        <div class="card-body">

                            <?php
                            if (isset($_GET["idpublicacao"])) {
                                $idpublicacao = ($_GET["idpublicacao"]);
                                $post = (Publicacao::mostraPublicacoesClient($idpublicacao));
                                foreach ($post as $cliente) {
                            ?>
                                    <div class="row w-100">
                                        <div class="col-lg-12 w-100 mb-2 id<?= $cliente->idpublicacao ?>">
                                            <div class="row bg-white rounded">
                                                <div class="col-7 w-100">
                                                    <div class="border-0">
                                                        <?php
                                                        if (isset(explode('.', $cliente->publicacao_arquivo)[1])) {
                                                            if (explode('.', $cliente->publicacao_arquivo)[1] != 'mp4') {
                                                        ?>
                                                                <div class="card-img p-2 m-auto w-100 img-responsive ">
                                                                    <img class="image-responsive w-100" src="../prestador/assets/img/post/<?= $cliente->publicacao_arquivo ?>" style="object-fit:cover; object-position:center;">
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="p-2">
                                                                    <video class="video w-100" controls poster="../prestador/assets/img/post/<?= $cliente->publicacao_arquivo ?>">
                                                                        <source src="../prestador/assets/img/post/<?= $cliente->publicacao_arquivo ?>" type="video/mp4">
                                                                    </video>
                                                                </div>
                                                        <?php }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="vcard mb-3 border-0">
                                                    <div class="fcard-body">
                                                        <h5 class="card-title mt-3"><?= $cliente->publicacao_titulo ?></h5>
                                                        <p class="card-text"><?= $cliente->publicacao_texto ?></p>
                                                        <h6 class="card-title"><?= $cliente->publicacao_data ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-5 w-100 mb-3">
                                                    <button class="btn border-0 rounde bi bi-heart text-warning me-2 reacao" title="0" onclick="reacoes(<?= $idpublicacao ?>, <?= $id_cliente ?>)">
                                                    </button>

                                                <?php
                                                if (reacoes::contarReacoes($idpublicacao) > 1) {
                                                    echo '<span class="ms-0 num-reacoes" title="' . reacoes::contarReacoes($idpublicacao) . '">' . reacoes::contarReacoes($idpublicacao) . ' Interessados</span>';
                                                } else {
                                                    echo '<span class="ms-0 num-reacoes" title="' . reacoes::contarReacoes($idpublicacao) . '">' . reacoes::contarReacoes($idpublicacao) . ' Interessado</span>';
                                                }
                                            }
                                                ?>
                                                <a class="btn btn-coment" href="#" role="button-comentario" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="pegarDadosParaComentario(<?= $idpublicacao ?>)" onmouseover="verComentario(<?= $idpublicacao ?>)">
                                                    <i class="bi bi-chat me-2 text-warning"></i> Comentários</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    <?php

                            }

                    ?>
                    </div>
                </div>

                <div class="col-4 bg-white">
                    <div class="card mb-2">
                        <div class="card-header">
                            Serviços
                        </div>
                    </div>
                    <?php
                    foreach ($servicos as $servico) {
                        print  '<div class="card mb-2 bg-light">
                                    <div class="card-body">
                                        <div class="card-title">
                                             <span><b>' . $servico->servico_designacao . '</b></span> 
                                        </div>
                                        <p class="text-start text-left ms-0 mt-2">' . $servico->servico_descricao . '</p>
                                       <div class="text-end"><a href="#" class="btn btn-warning btn-sm rounded-5">contratar</a></div>
                                        
                                    </div>
                                </div>';
                    } ?>
                </div>
            </div>
        </section>
    </div>

    <?php require './components/modalComentario.php'; ?>

    <script>
        /* hover reação */
        numReacoes = document.querySelector('.num-reacoes')
        reacao = document.querySelector('.reacao')
        let msg = " Interessado"
        reacao.addEventListener('click', () => {
            if (parseInt(numReacoes.title) >= 2) {
                msg = " Interessados"
            }
            if (reacao.title == '0') {
                reacao.classList.add('bi-heart-fill')
                reacao.classList.remove('bi-heart')
                reacao.title = '1'
                reacao.classList.add('text-warning')
                reacao.classList.remove('text-dark')
                numReacoes.title = parseInt(numReacoes.title) + 1
                numReacoes.innerHTML = ` ${numReacoes.title} ${msg}`
            } else {
                reacao.classList.remove('bi-heart-fill')
                reacao.classList.add('bi-heart')
                reacao.title = '0'
                reacao.classList.remove('text-warning')
                reacao.classList.add('text-dark')
                if (parseInt(numReacoes.title) - 1 <= 0) {

                    numReacoes.title = parseInt(numReacoes.title) - 1
                    numReacoes.innerHTML = ` ${numReacoes.title} ${msg}`
                }
            }

            return reacao.title
        })

        const reacoes = (id_post, id_cliente) => {
            payload = new FormData()
            payload.append('acao', 'reagir-post')
            payload.append('id-cliente', id_cliente)
            payload.append('id-post', id_post)
            fetch('./requests.php', {
                body: payload,
                method: 'POST',
            })

            return id_post
        }

        /* ver comentários */

        const verComentario = (id_post, dados) => {
            /* SHOW COMMENT */

            setInterval(() => {
                dados = new FormData();
                dados.append('acao', 'ver-post')
                dados.append('id-post', id_post)
                fetch('./requests.php', {
                        body: dados,
                        method: 'POST',
                    })
                    .then(res => res.text())
                    .then(response => {
                        document.querySelector('.coment-div').innerHTML = response

                    })
            }, 2500);
        }

        const pegarDadosParaComentario = (id_post) => {
            formComent = document.querySelector('.comentar-post')
            formComent.addEventListener('submit', (e, payload) => {
                e.preventDefault()
                payload = new FormData(formComent)
                payload.append('acao', 'comentar-post')
                payload.append('id-post', id_post)

                fetch('./requests.php', {
                    method: 'POST',
                    body: payload
                })

                formComent.reset()
            })
        }

        const dadosServicoNaModal = (id_servico, nome_servico, $id_prestador, prestador_nome) => {
            document.querySelector('.servico').setAttribute('value', nome_servico)
            document.querySelector('.servico-input').setAttribute('value', id_servico)
            document.querySelector('.prestador').setAttribute('value', prestador_nome)
            document.querySelector('.prestador-input').setAttribute('value', $id_prestador)
        }
        
        const novoContrato = () => {
            contratoForm = document.querySelector(".form-novo-contrato")
            contratoForm.addEventListener('submit', (e, payload) => {
                e.preventDefault()
            })
        }
    </script>

    <script src="<?= ROUTE ?>public/js/popper.js"></script>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= ROUTE ?>plugins/aos/aos.js"></script>
    <script>
        AOS.init()
        // document.querySelector('.btn-coment').click()
    </script>

</body>

</html>