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
    <title>Serviços de Mudanças</title>
</head>

<body>
    <!-- MENU NAVBAR -->
    <?php require './components/header.php'; ?>
    <!-- FIM MENU NAVBAR -->

    <!-- CAROUCEL -->
    <div id="carouselExampleCaptions" class="carousel slide mt-5">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= ROUTE ?>storage/image/slides/bg1.jpg" class="d-block w-100 image-slide" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= ROUTE ?>storage/image/slides/bg2.jpg" class="d-block w-100 image-slide" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= ROUTE ?>storage/image/slides/bg3.jpg" class="d-block w-100 image-slide" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= ROUTE ?>storage/image/slides/bg4.jpg" class="d-block w-100 image-slide" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= ROUTE ?>storage/image/slides/bg5.jpg" class="d-block w-100 image-slide" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= ROUTE ?>storage/image/slides/bg6.jpg" class="d-block w-100 image-slide" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div><!-- / FIM CAROUCEL -->

    <!-- SECTION HERO SERVIÇOS E PRESTADORES -->
    <section class="hero-1 mt-5" id="servicos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-5"> <!-- Coluna da esquerda -->
                            <!-- primeiro tipo -->
                            <div class="card rounded-0 mb-1 h-25" data-aos="fade-left" data-aos-duration="1500">
                                <div class="card-body mb-2">
                                    <div class="alert show ms-5 div-icon">
                                        <img src="<?= ROUTE ?>storage/image/icon-image/service-icon1.png" alt="">
                                        <h5 class="card-title">Mudanças domésticas ou residenciais</h5>
                                        <p class="card-text">Este serviço é para clientes que desejam mudar de uma casa para outra...</p>
                                    </div>
                                </div>
                            </div><!-- fim primeiro tipo -->
                            <!-- Segundo  tipo -->
                            <div class="card rounded-0 mb-1 h-25" data-aos="fade-left" data-aos-duration="1500">
                                <div class="card-body mb-2">
                                    <div class="alert show ms-5 div-icon">
                                        <img src="<?= ROUTE ?>storage/image/icon-image/service-icon2.png" alt="">
                                        <h5 class="card-title">Mudanças comerciais ou de escritório</h5>
                                        <p class="card-text">Este serviço é para empresas que desejam realizar mudanças ou carregar os seus móveis....</p>
                                    </div>
                                </div><!-- fim Segundo  tipo -->
                            </div>
                            <!-- terceiro  tipo -->
                            <div class="card rounded-0 mb-1 h-25" data-aos="fade-left" data-aos-duration="1500">
                                <div class="card-body mb-2">
                                    <div class="alert show ms-5 div-icon">
                                        <img src="<?= ROUTE ?>storage/image/icon-image/service-icon3.png" alt="">
                                        <h5 class="card-title">Transporte</h5>
                                        <p class="card-text">Este serviço é para clientes que desejam um transporte para carregar o seu mobiliário... </p>
                                    </div>
                                </div>
                            </div><!-- fim terceiro -->
                        </div><!-- Fim coluna esquerda -->
                        <!-- Coluna do meio -->
                        <div class="col-2" data-aos="zoom-in" data-aos-duration="2000">
                            <img src="<?= ROUTE ?>storage/image/services/service-center.jpg" class="foto-hero-0">
                            <img src="<?= ROUTE ?>storage/image/services/service-center.png" class="foto-hero-0">
                        </div>
                        <div class="col-5"> <!-- Coluna da diretia -->
                            <!-- tipo empresa  -->
                            <div class="card rounded-0 mb-1 h-25" data-aos="fade-left" data-aos-duration="1500">
                                <div class="card-body mb-2">
                                    <div class="alert show ms-5 div-icon">
                                        <img src="<?= ROUTE ?>storage/image/icon-image/service-icon4.png" alt="">
                                        <h5 class="card-title">Empresas</h5>
                                        <p class="card-text">Este tipo de prestadores oferecem os tês tipos de Serviço de Mudança em toda Angola. Responde as mensagens das 8h ás 20h</p>
                                    </div>
                                </div>
                            </div><!-- Fimmtipo empresa -->

                            <!-- tipo Particulares -->
                            <div class="card rounded-0 mb-1 h-25" data-aos="fade-left" data-aos-duration="1500">
                                <div class="card-body mb-2">
                                    <div class="alert show ms-5 div-icon">
                                        <img src="<?= ROUTE ?>storage/image/icon-image/service-icon5.png" alt="">
                                        <h5 class="card-title">Particulares</h5>
                                        <p class="card-text"> Os Prestadores Particulares oferencem os serviços de transporte e mudanças domésticas ou residenciais.</p>
                                    </div>
                                </div>
                            </div><!-- Fim tipo particulares -->

                            <!-- ultimo tipo-->
                            <div class="card rounded-0 mb-1 h-25" data-aos="fade-left" data-aos-duration="1500">
                                <div class="card-body mb-2">
                                    <div class="alert show ms-5 div-icon">
                                        <img src="<?= ROUTE ?>storage/image/icon-image/service-icon6.png" alt="">
                                        <h5 class="card-title">Mixeiros</h5>
                                        <p class="card-text">Oferecem mais o serviço de transporte mas têm também boas soluções para os outros serviços de mudança.</p>
                                    </div>
                                </div>
                            </div> <!-- fim ultimo tipo-->
                        </div><!-- Fim coluna da direita -->
                    </div>
                </div>


            </div>
        </div>
    </section> <!-- END SECTION HERO SERVIÇOS E PRESTADORES -->

    <!-- SECTION Prestadores-->
    <section class="hero-prestadores p-2 bg-light" id="prestadores">
        <div class="container">
            <h5 class="mb-5 mt-5 text-center text-uppercase">Prestadores</h5>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                foreach ($prestador as $key) { ?>
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-0 h-100" data-aos="fade-up" data-aos-duration="1000">
                            <img src="../prestador/assets/img/prestador/<?= $key->prestador_foto ?>" class="card-img-top rounded-0 foto-prestador" alt="...">
                            <div class="card-body border-0">
                                <div class="card-title">
                                    <h5 class="text-black">
                                        <a href="./prestador-info.php?id-prestador=<?= $key->idprestador ?>" class="text-black"><?= $key->prestador_nome ?></a>
                                    </h5>
                                </div>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, eligendi temporibus odio reiciendis ipsam expedita quod assumenda accusamus nihil maiores aspernatur dignissimos dolore consequuntur nulla quo! Consequuntur odit neque minima.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ROUTE ?>plugins/aos/aos.js"></script>
    <script>
        AOS.init()
    </script>
</body>

</html>