<?php
require '../prestador/vendor/autoload.php';
require_once './config.php';

if (!isset($_SESSION['id-cliente'])) {
    header('location:../prestador/views/login-client.php');
}


use App\Controller\publicacoesController as Publicacao;
use App\Controller\prestadoresController as Prestador;

$id_prestador = ($_GET["id-prestador"]);
$prestador = Prestador::getAll($id_prestador);
$publicacoes = Publicacao::mostraPublicacao($id_prestador);
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
        <section class="info">
            <div class="row">
                <div class="col-4 bg-light p-2">
                    <?php
                    foreach ($publicacoes as $post) : ?>
                        <div class="alert alert-light" role="alert">
                            <a class="btn" href="./prestador-info.php?id-prestador=<?= $id_prestador ?>&idpublicacao=<?= $post->idpublicacao ?>"><?= $post->publicacao_titulo ?>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="col-8" style="background: url(./storage/image/prestador/2.jpg);">
                    <div>
                        <div class="card border-0 bg-transparent">
                            <div class="card-body">
                                <div class="card-title">
                                    <div class="float-end">
                                        <h5 class="text-warning"><?= $prestador->prestador_nome ?></h5>
                                    </div>
                                    <div class="icons text-white h3 float-end me-5">
                                        <i class="bi bi-chat-dots text-warning"></i>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET["idpublicacao"])) {
                                    $idpublicacao = ($_GET["idpublicacao"]);
                                    $post = (Publicacao::mostraPublicacoesClient($idpublicacao));
                                    foreach ($post as $cliente) {
                                ?>
                                        <div class="row w-100">
                                            <div class="col-lg-12 w-100 mb-3 mt-5 id<?= $cliente->idpublicacao ?>">
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
                                                        <a class="btn rounde" href="#" onclick="" role="button-reacao" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-heart text-warning"></i> 12 Interessados
                                                        </a>
                                                        <a class="btn" href="#" role="button-comentario" onclick="mostrarcomentModal(<?= $cliente->idpublicacao ?>)" data-toggle="modal" data-target="#modalNewPost">
                                                            <i class="ni i-chat-round mr-3"></i> 7 Comentários</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                    <?php
                                    }
                                }

                    ?>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>

    <script>
        function mostrarcomentModal(id_post) {
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

                    document.querySelector("#modalNewPostLabel").innerHTML = "Comentar Publicação";
                    document.querySelector(".titulo-post").classList.add('d-none');
                    document.querySelector(".foto-post").classList.add('d-none');
                    document.querySelector(".texto-post").setAttribute('placeholder', "escreve aqui o teu comentário");;
                    document.querySelector(".button-post").innerHTML = "Comentar";
                    document.querySelector(".id-post").setAttribute('value', id_post);
                })

        }
    </script>

    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ROUTE ?>plugins/aos/aos.js"></script>
    <script>
        AOS.init()
    </script>

</body>

</html>