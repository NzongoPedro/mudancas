<?php
require_once '../config.php';
require_once '../checkLogin.php';
?>
<!DOCTYPE html>
<php lang="pt">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      Prestador - Serviços de Mudanças
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
        <div class="row">
          <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                    <h2 class="text-white mb-0">Sales value</h2>
                  </div>
                  <div class="col">
                    <ul class="nav nav-pills justify-content-end">
                      <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                          <span class="d-none d-md-block">Month</span>
                          <span class="d-md-none">M</span>
                        </a>
                      </li>
                      <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                          <span class="d-none d-md-block">Week</span>
                          <span class="d-md-none">W</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                  <!-- Chart wrapper -->
                  <canvas id="chart-sales" class="chart-canvas"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card shadow">
              <div class="card-header bg-transparent">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                    <h2 class="mb-0">Total orders</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                  <canvas id="chart-orders" class="chart-canvas"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Page visits</h3>
                  </div>
                  <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Page name</th>
                      <th scope="col">Visitors</th>
                      <th scope="col">Unique users</th>
                      <th scope="col">Bounce rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        /argon/
                      </th>
                      <td>
                        4,569
                      </td>
                      <td>
                        340
                      </td>
                      <td>
                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        /argon/index.php
                      </th>
                      <td>
                        3,985
                      </td>
                      <td>
                        319
                      </td>
                      <td>
                        <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        /argon/charts.php
                      </th>
                      <td>
                        3,513
                      </td>
                      <td>
                        294
                      </td>
                      <td>
                        <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        /argon/tables.php
                      </th>
                      <td>
                        2,050
                      </td>
                      <td>
                        147
                      </td>
                      <td>
                        <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        /argon/profile.php
                      </th>
                      <td>
                        1,795
                      </td>
                      <td>
                        190
                      </td>
                      <td>
                        <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Social traffic</h3>
                  </div>
                  <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Referral</th>
                      <th scope="col">Visitors</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">
                        Facebook
                      </th>
                      <td>
                        1,480
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="mr-2">60%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        Facebook
                      </th>
                      <td>
                        5,480
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="mr-2">70%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        Google
                      </th>
                      <td>
                        4,807
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="mr-2">80%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        Instagram
                      </th>
                      <td>
                        3,678
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="mr-2">75%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        twitter
                      </th>
                      <td>
                        2,645
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="mr-2">30%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
          <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
              <div class="copyright text-center text-xl-left text-muted">
                &copy; 2018 <a hreaf="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative
                  Tim</a>
              </div>
            </div>
            <div class="col-xl-6">
              <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                <li class="nav-item">
                  <!--   <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a> -->
                </li>
                <li class="nav-item">
                  <!--  <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a> -->
                </li>
                <li class="nav-item">
                  <!--  <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a> -->
                </li>
                <li class="nav-item">
                  <!--  <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link"
                  target="_blank">MIT License</a> -->
                </li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core   -->
    <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="../assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
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

</php>