<?php require_once '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">

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
                <div class="col">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Publicações antigas</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Título</th>
                                        <th scope="col">Reações</th>
                                        <th scope="col">Comentários</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">Argon Design System</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            $2,500 USD
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-warning"></i> pending
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">60%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            $1,800 USD
                                        </td>
                                        <td>
                                            <span class="badge badge-dot">
                                                <i class="bg-success"></i> completed
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">Black Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            $3,150 USD
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-danger"></i> delayed
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">72%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">React Material Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            $4,400 USD
                                        </td>
                                        <td>
                                            <span class="badge badge-dot">
                                                <i class="bg-info"></i> on schedule
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">90%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            $2,200 USD
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i> completed
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                </a>
                                                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
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