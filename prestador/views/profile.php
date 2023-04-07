<?php
require_once '../config.php';
require_once '../checkLogin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Nome prestador
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

  <style>
    /*   .form-upload {
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
    } */
  </style>
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
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h5 class="display-4 text-white"><?= $prestador->prestador_nome ?></h5>
            <p class="text-white mt-0 mb-5">Este é um exeplo de uma mensagem de boas vindas.!!!</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?= ROUTE ?>assets/img/prestador/<?= $prestador->prestador_foto ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalAddFoto">Foto</a>
                <a href="#" class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#modalMensagem">Mensagens</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Serviços</span>
                    </div>
                    <div>
                      <span class="heading">20</span>
                      <span class="description">Publicações</span>
                    </div>
                    <div>
                      <span class="heading">25</span>
                      <span class="description">Contratos</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?= $prestador->prestador_nome ?>
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar dados da conta</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form class="form-dados-pessoas">
                <h6 class="heading-small text-muted mb-4">Informações de usuários</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nome</label>
                        <input name="nome-prestador" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Nome" value="<?= $prestador->prestador_nome ?> ">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">E-mail</label>
                        <input name="email-prestador" type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?= $prestador->prestador_email ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Tipo</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="Tipo de prestadores" value="<?= $prestador->tipo_prestador ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Identificação</label>
                        <input name="num-ident" type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Número de indentificação" value="<?= $prestador->prestador_identificacao ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="r-1"></div>
                <div class="text-right">
                  <button type="submit" class="btn btn-sm btn-primary">editar dados pessoas</button>
                </div>
                <input type="hidden" name="id-prestador" value="<?= $id_prestador ?>">
              </form>
              <hr class="my-4" />
              <!-- Address -->
              <form action="">
                <h6 class="heading-small text-muted mb-4">Informações de contacto</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">endereço google map</label>
                        <input name="map-prestador" id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-whatsapp">whatsapp</label>
                        <input name="whasapp-prestador" id="input-whatsapp" class="form-control form-control-alternative" placeholder="Whatsapp" value="<?= $prestador->prestador_whatsapp ?>" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">Provícia</label>
                      <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Município</label>
                      <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Bairro</label>
                      <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Rua</label>
                      <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                    </div>
                  </div>
                </div>
            </div>
            </form>
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

    const editarDadosPessoas = () => {
      resposta_1 = document.querySelector('.r-1')
      const formDadosPessoas = document.querySelector('.form-dados-pessoas')
      formDadosPessoas.addEventListener('submit', (e, payload) => {
        e.preventDefault();
        payload = new FormData(formDadosPessoas)
        payload.append('acao', 'edit-personal-data')
        /* ADD AJAX FOR HTTP REQUEST ASYNC */
        fetch(urll, {
            method: 'POST',
            body: payload
          })
          .then(res => res.json())
          .then(response => {
            if (response.status == 'sucesso') {
              resposta_1.innerHTML =
                `<div class="alert alert-success">${response.msg}</div>`
              setTimeout(() => {
                location.reload()
              }, 1500);
            } else {
              resposta_1.innerHTML =
                `<div class = "alert alert-danger">${response.msg}</div>`
            }
          })
          .catch(e => {
            resposta_1.innerHTML = e
          })
      })
    }

    editarDadosPessoas()

    /* ADD FOTO PERFIL  PRESTADOR */
    const addFoto = async (dados, id_prestador) => {
      const foto = document.querySelector(".form-foto")
      let resp = document.querySelector(".form-foto-response")
      foto.addEventListener('submit', (e, dados) => {
        e.preventDefault()
        dados = new FormData(foto)
        dados.append('acao', 'add-foto-prestador')
        fetch(urll, {
            method: 'POST',
            body: dados,
            'Content-Type': "multipart/form-data"
          })
          .then(res => res.json())
          .then(response => {
            if (response.status == 'sucesso') {
              resp.innerHTML =
                `<div class="alert alert-success">${response.msg}</div>`
              setTimeout(() => {
                location.reload()
              }, 1500);
            } else {
              resp.innerHTML =
                `<div class = "alert alert-danger">${response.msg}</div>`
            }
          })
        console.log((dados))
      })

    }
    addFoto()
  </script>
  <script>
    if (<?= $estado_conta ?> == '0') {
      document.querySelector('.mt--7')
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