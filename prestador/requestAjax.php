<?php


require_once './vendor/autoload.php';


use App\Controller\prestadoresController as prestar;



if (isset($_POST['acao'])) {

    $acao = filter_input(INPUT_POST, 'acao');

    switch ($acao) {

        case 'store':


            $nome_prestador = filter_input(INPUT_POST, 'nome-prestador');
            $email_prestador = filter_input(INPUT_POST, 'email-prestador', FILTER_SANITIZE_EMAIL);
            $tipo_prestador = filter_input(INPUT_POST, 'tipo-prestador', FILTER_SANITIZE_NUMBER_INT);
            $nif_prestador = filter_input(INPUT_POST, 'nif-prestador', FILTER_SANITIZE_NUMBER_INT);
            $whatsapp_prestador = filter_input(INPUT_POST, 'whatsapp-prestador', FILTER_SANITIZE_NUMBER_INT);
            $mapGoole_prestador = filter_input(INPUT_POST, 'link-mapa', FILTER_SANITIZE_URL);
            $senha_prestador = md5(filter_input(INPUT_POST, 'senha-prestador'));

            echo json_encode(prestar::store($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador));
            break;

        case 'login':

            $email_prestador = filter_input(INPUT_POST, 'email-prestador', FILTER_SANITIZE_EMAIL);
            $senha_prestador = md5(filter_input(INPUT_POST, 'senha-prestador'));

            echo json_encode(prestar::login($email_prestador, $senha_prestador));
            break;

        default:
            # code...
            break;
    }
}
