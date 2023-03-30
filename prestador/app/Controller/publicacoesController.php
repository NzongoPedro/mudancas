<?php

namespace App\Controller;

use App\Model\publicacoes as Publicar;

class publicacoesController
{

    /* GET ALL DATA */

    public static function getAll($id_publicacao)
    {
        return Publicar::getAllData($id_publicacao);
    }

    /* sent */

    public static function  sent($publicacao_titulo, $publicacao_texto, $publicacao_arquivo, $publicacao_data, $id_prestador, $idpublicacao)
    {
        return Publicar::sents($publicacao_titulo, $publicacao_texto, $publicacao_arquivo, $publicacao_data, $id_prestador, $idpublicacao);
    }

    /* Mostra a publicação*/
    public static function mostraPublicacao($id_prestador)
    {
        $publicacoes = Publicar::mostraPublicacoes($id_prestador);
        return $publicacoes;
    }
    /* Mostra a publicação*/
    public static function mostraPublicacaoModal($id_prestador)
    {
        $publicacoes = Publicar::mostraPublicacoesModal($id_prestador);
        return $publicacoes;
    }

    /* Mostra a publicação no lado do cliente*/
    public static function mostraPublicacoesClient($id_publicacao)
    {
        $publicacoes = Publicar::mostraPublicacoesClients($id_publicacao);
        return $publicacoes;
    }

    /* Mostra a publicação*/
    public static function eliminarPublicacao($id_publicacao)
    {
        $publicacoes = Publicar::eliminarPublicacoes($id_publicacao);
        return $publicacoes;
    }
}
