<?php

namespace App\Model;

use App\Model\Conexao as ligar;

class publicacoes
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }
    /*   public static function uploadPhoto($foto,  $user)
    {
        $erros = NULL;
        $arquivo = array(
            'arquivo'  => $foto['name'],
            'temporal' => $foto['tmp_name'],
            'tipo' => strtolower($foto['type']),
            'formato'  => strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION)),
            'nome' => time() . '.' . strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION)),
            'diretorio' => './Storage/images/users/'
        );

        $formatos_permitidos = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif', 'image/jfif');

        # =========================== VERIFICA OS FORMATOS PERMITIDOS =====================
        if (in_array($arquivo['tipo'], $formatos_permitidos)) {

            # ========================= VERIFICA O DIRECTORIO =====================
            if (is_dir($arquivo['diretorio'])) {

                # ===================================== TENTA O UPLOAD ==================
                if (move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome'])) {
                    $foto = $arquivo['nome'];
                } else {
                    $erros = 'Falha no upload.';
                }
            } else {
                mkdir($arquivo['diretorio']);
                move_uploaded_file($arquivo['temporal'], $arquivo['diretorio'] . $arquivo['nome']);
                $foto = $arquivo['nome'];
            }
        } else {
            $foto = null;
            $erros = 'Formato .' . $arquivo['formato'] . ' não é permitido';
        }

        if ($erros == NULL) {
            self::sent($foto, $user);
            return ['status' => 'sucesso', 'msg' => ''];
        } else {
            return ['status' => 'erro', 'msg' => $erros];
        }
    } */

    public static function sent($titulo, $foto, $content)
    {
        
    }
}
