<?php


require_once './vendor/autoload.php';


use App\Controller\prestadoresController as prestar;
use App\Controller\servicosController as servicos;
use App\Controller\publicacoesController as publicar;


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

        case 'store-servico':

            $designacao = addslashes(htmlspecialchars(filter_input(INPUT_POST, 'nome-servico')));
            $descricao = nl2br(addslashes(htmlspecialchars(filter_input(INPUT_POST, 'descricao-servico'))));
            $id_prestador = nl2br(addslashes(htmlspecialchars(filter_input(INPUT_POST, 'id-prestador', FILTER_SANITIZE_NUMBER_INT))));

            echo json_encode(servicos::store($designacao, $descricao, $id_prestador));

            break;

        case 'edit-personal-data':

            $nome_prestador = filter_input(INPUT_POST, 'nome-prestador');
            $email_prestador = filter_input(INPUT_POST, 'email-prestador', FILTER_SANITIZE_EMAIL);
            $nif_prestador = filter_input(INPUT_POST, 'num-ident', FILTER_SANITIZE_NUMBER_INT);
            $id_prestador = filter_input(INPUT_POST, 'id-prestador', FILTER_SANITIZE_NUMBER_INT);

            echo json_encode(prestar::editaDadosPessoas($nome_prestador, $email_prestador, $nif_prestador, $id_prestador));

            break;


        case 'post':

            $publicacao_titulo = filter_input(INPUT_POST, 'titulo-post');
            $publicacao_texto = nl2br(filter_input(INPUT_POST, 'conteudo-post'));
            $publicacao_arquivo = $_FILES["arquivo-post"];
            $publicacao_data = filter_input(INPUT_POST, 'data-post');
            $id_prestador = filter_input(INPUT_POST, 'id_prestrador-post', FILTER_SANITIZE_NUMBER_INT);
            $idpublicacao = filter_input(INPUT_POST, 'id-post', FILTER_SANITIZE_NUMBER_INT);

            echo json_encode(publicar::sent($publicacao_titulo, $publicacao_texto, $publicacao_arquivo,  $publicacao_data, $id_prestador, $idpublicacao));
            break;

        case 'editarPostModal':

            $idpublicacao = filter_input(INPUT_POST, 'idpublicacao', FILTER_SANITIZE_NUMBER_INT);

            $mostrar = publicar::mostraPublicacaoModal($idpublicacao);
            //var_dump($mostrar);
            echo json_encode($mostrar);
            break;

        case 'eliminarPost':

            $idpublicacao = filter_input(INPUT_POST, 'idpublicacao', FILTER_SANITIZE_NUMBER_INT);
            echo json_encode(publicar::eliminarPublicacao($idpublicacao));
            break;

        case 'add-foto-prestador';
            $id_prestador = filter_input(INPUT_POST, 'id-prestrador', FILTER_SANITIZE_NUMBER_INT);
            $foto = $_FILES['foto-prestador'];
            echo json_encode(prestar::addFoto($foto, $id_prestador));
            break;

        default:
            # code...
            break;
    }
}
