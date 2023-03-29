  <!-- Form -->
  <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
      <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="pesquisar" type="text">
          </div>
      </div>
  </form>
  <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                  <?php
                    if ($prestador->prestador_foto == 'nullo') { ?>
                      <span class="avatar avatar-sm rounded-circle">
                          <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg">
                      </span>
                  <?php } else { ?>
                      <span class="avatar avatar-sm rounded-circle">
                          <img alt="Image placeholder" src="<?= ROUTE ?>assets/img/prestador/<?= $prestador->prestador_foto ?>">
                      </span>
                  <?php } ?>
                  <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm  font-weight-bold"><?= $prestador->prestador_nome ?></span>
                  </div>
              </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Bem Vindo</h6>
              </div>
              <a href="<?= ROUTE ?>views/profile.php" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Perfil</span>
              </a>
              <a href="<?= ROUTE ?>views/profile.php" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Configurações</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= ROUTE ?>views/sair.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Sair</span>
              </a>
          </div>
      </li>
  </ul>