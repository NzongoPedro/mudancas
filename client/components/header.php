 <?php
    require 'vendor/autoload.php';

    use Http\controller\clienteController as cliente;

    if (isset($_SESSION['id-cliente'])) {
        $id_cliente = $_SESSION['id-cliente'];
        $cliente = cliente::show($id_cliente);
        $nomeCliente = $cliente->cliente_nome;
        $idcliente = $cliente->idcliente ;
    }

    ?>
 <header class="p-3 bg-light fixed-top w-100 mb-4 fundo-2">
     <div class="container ">
         <div class="ms-0 float-start">
             <a href="" class="navbar-brand">
                 <img src="../prestador/assets/img/brand/blue.png" style="width: 55px !important; transform:scale(1.3)">
             </a>
         </div>
         <ul class="nav justify-content-end navegacao">
             <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="./index.php#home">Página inicial</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="./index.php#prestadores">Prestador</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="./index.php#servicos">Serviços</a>
             </li>

             <?php

                if (isset($_SESSION['id-cliente'])) { ?>
                 <div class="icon-perfil ms-5">
                     <div class="icon">
                         <i class="bi bi-person-fill ms-2"></i>
                         <span class="me-3 text-light">
                             <a href="./perfil.php" class="text-light"> <?= $cliente->cliente_nome ?></a>
                         </span>
                     </div>
                 </div>
             <?php } ?>
         </ul>
     </div>
 </header>