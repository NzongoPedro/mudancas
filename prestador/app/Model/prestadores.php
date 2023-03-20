<?php

namespace App\Model;

use App\Model\Conexao as ligar;

use Exception;

class prestadores
{

    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* VALIDATE DATA */

    public static function validateDate($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador)
    {
        $erro = null;

        if (!preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊîÎôÔûÛçÇ&@_  ]*$/", $nome_prestador) || ltrim(strlen($nome_prestador) < 0) || $nome_prestador ==  "" || $nome_prestador == null || empty($nome_prestador)) {
            $erro = 'Verifica o nome inserido.';
        }

        if (!is_numeric($whatsapp_prestador) || !preg_match("/^[0-9]*$/", $whatsapp_prestador) || 9 > strlen($whatsapp_prestador) || 9 < strlen($whatsapp_prestador) || $whatsapp_prestador[0] != 9) {
            $erro = 'Verfica o whatsapp inserido.';
        }

        if (!filter_var($email_prestador, FILTER_VALIDATE_EMAIL)) {
            $erro = 'O E-mail inserido não é válido';
        }

        if (strlen($senha_prestador) <= 8) {
            $erro = 'A senha deve conter no mínimo 8 catacteres.';
        }

        if ($tipo_prestador <= 0) {
            $erro = 'Selecione o tipo de prestação';
        }

        /*   if (filter_var($mapGoole_prestador, FILTER_SANITIZE_URL)) {
            $erro = 'O link do Google map não é válido';
        } */

        return $erro;
    }

    /*
         GET TYPE O PRESTADORES 
         AFTER THIS, WE WILL SHOW ALL DATAS
         THESE DATAS IS SHOWED IN SELECT FORM
     */

    public static function getTypeOfPrestadores()
    {

        $query = self::getInstance()->query("SELECT *FROM tipo_prestador ORDER BY tipo_prestador");
        $dataRow = $query->fetchAll();

        return $dataRow;
    }

    /* Get All data by id of prestador */

    public static function getAllData($id_prestador)
    {
        /* MAKE OR JOIN FORIGN KEY TO ANOTHER TABLES */
        $get  = self::getInstance()->query("SELECT *FROM prestador AS P
        INNER JOIN tipo_prestador AS TP ON P.id_tipo_orestador = TP.idtipo_prestador
        INNER JOIN enderecos_prestador AS EP ON P.id_endereco = EP.idenderecos_prestador 
        WHERE P.idprestador = '$id_prestador'
        ");

        $rows = $get->fetch();

        return $rows;
    }

    /* STORE */

    public static function storer($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador)
    {

        $store = self::getInstance()->prepare("INSERT INTO prestador (prestador_nome, id_tipo_orestador, prestador_identificacao, prestador_localizacao, prestador_email, prestador_whatsapp, prestador_senha, id_endereco)
        VALUES(?,?,?,?,?,?,?,?)
        ");

        $store->bindValue(1, $nome_prestador);
        $store->bindValue(2, $tipo_prestador);
        $store->bindValue(3, $nif_prestador);
        $store->bindValue(4, $mapGoole_prestador);
        $store->bindValue(5, $email_prestador);
        $store->bindValue(6, $whatsapp_prestador);
        $store->bindValue(7, $senha_prestador);
        $store->bindValue(8, 1);

        $erros = self::validateDate($nome_prestador, $email_prestador, $senha_prestador, $nif_prestador, $mapGoole_prestador, $whatsapp_prestador, $tipo_prestador);
        if (!$erros) {
            if ($store->execute()) {
                return ['status' => 'sucesso', 'msg' => 'Sucesso ao registrar'];
            }
        } else {
            return ['status' => 'erro', 'msg' => $erros];
        }
    }

    /* LOGIN */

    public static function login($email, $password)
    {

        $selectEmail = self::getInstance()->query("SELECT prestador_email FROM prestador WHERE prestador_email = '" . $email . "'");
        if ($selectEmail->rowCount() > 0) {
            $selectPassord = self::getInstance()->query("SELECT prestador_senha FROM prestador WHERE prestador_senha = '" . $password . "'");
            if ($selectPassord->rowCount() > 0) {
                $data = self::getInstance()->query("SELECT *FROM prestador WHERE prestador_email = '$email' AND prestador_senha = '$password'");
                if ($data->rowCount() > 0) {
                    session_start();
                    $_SESSION['id-prestador'] = $data->fetch()->idprestador;

                    return ['status' => 'sucesso', 'msg' => 'Acesso garantido'];
                } else {
                    return ['status' => 'erro', 'msg' => 'Verifique se os seus dados estão corretos', 'data' => $_POST];
                }
            } else {

                return ['status' => 'erro', 'msg' => 'palavra-passe incorreta'];
            }
        } else {
            return ['status' => 'erro', 'msg' => 'E-mail inexistente'];
        }
    }
}
