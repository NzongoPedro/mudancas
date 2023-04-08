  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="index.php">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-people"></i><span>Usuários</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="./clientes.php">
                          <i class="bi bi-circle"></i><span>clientes</span>
                      </a>
                  </li>
                  <li>
                      <a href="./prestadores.php">
                          <i class="bi bi-circle"></i><span>Prestadores</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Tables Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-faq.php">
                  <i class="bi bi-question-circle"></i>
                  <span>Contratos</span>
              </a>
          </li><!-- End F.A.Q Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-register.php">
                  <i class="bi bi-power"></i>
                  <span>Sair</span>
              </a>
          </li><!-- End Register Page Nav -->

      </ul>

  </aside>