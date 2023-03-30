 <?php
    require 'vendor/autoload.php';

    use Http\controller\clienteController as cliente;

    if (isset($_SESSION['id-cliente'])) {
        $id_cliente = $_SESSION['id-cliente'];
        $cliente = cliente::show($id_cliente);
    }

    ?>
 <header class="p-3 bg-light fixed-top w-100 mb-4">
     <div class="container ">
         <div class="ms-0 float-start">
             <a href="" class="navbar-brand">
                 LOGO
             </a>
         </div>
         <ul class="nav justify-content-end navegacao">
             <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="#home">Página inicial</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#prestadores">Prestador</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#servicos">Serviços</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link disabled">Disabled</a>
             </li>
             <?php

                if (isset($_SESSION['id-cliente'])) { ?>
                 <div class="icon-perfil ms-5">
                     <div class="icon">
                         <i class="bi bi-person-fill ms-2"></i>
                         <span class="me-3">
                             <?= $cliente->cliente_nome ?>
                         </span>
                     </div>
                 </div>
             <?php } ?>
         </ul>
     </div>
 </header>