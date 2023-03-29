<?php require './config.php'; ?>
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
                    <article>
                        <div class="alert rounded-0 bg-white">
                            Your alert content here
                        </div>
                    </article>
                    <article>
                        <div class="alert rounded-0 bg-white">
                            Your alert content here
                        </div>
                    </article>
                    <article>
                        <div class="alert rounded-0 bg-white">
                            Your alert content here
                        </div>
                    </article>
                    <article>
                        <div class="alert rounded-0 bg-white">
                            Your alert content here
                        </div>
                    </article>
                </div>
                <div class="col" style="background: url(./storage/image/prestador/2.jpg);">
                <div class="col" style="background: url(./storage/image/prestador/2.jpg); background-repeat:no-repeat">
                    <div class="card border-0 bg-transparent">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="float-end">
                                    <h5 class="text-warning">Nome prestador</h5>
                                </div>
                                <div class="icons text-white h3 float-end me-5">
                                    <i class="bi bi-chat-dots text-warning"></i>
                                </div>
                            </div>
                            <p class="text-white mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi reprehenderit tempore consequatur fugiat totam a consectetur eveniet ex quod sequi, in id sunt iste deserunt esse nemo accusantium officia ea?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= ROUTE ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ROUTE ?>plugins/aos/aos.js"></script>
    <script>
        AOS.init()
    </script>
</body>

</html>