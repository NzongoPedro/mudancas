<?php

namespace Http\model;

use Http\model\Conexao as ligar;

class client
{
    /* CREATE ONE CONECTION INSTACE */

    public static function getInstance()
    {
        $ligar  = new  ligar();

        $ligar = $ligar->ligar();

        return $ligar;
    }

    /* VALIDATE DATA */

    public static function validateDate($cliente_nome, $cliente_telefone, $cliente_whatsapp, $cliente_email, $cliente_senha, $cliente_identificacao, $cliente_localizacao)
    {
        $erro = null;

        if (!preg_match("/^[a-zA-ZáÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊîÎôÔûÛçÇ&@_  ]*$/", $cliente_nome) || ltrim(strlen($cliente_nome) < 0) || $cliente_nome ==  "" || $cliente_nome == null || empty($cliente_nome)) {
            $erro = 'Verifica o nome inserido.';
        }

        if (!is_numeric($cliente_whatsapp) || !preg_match("/^[0-9]*$/", $cliente_whatsapp) || 9 > strlen($cliente_whatsapp) || 9 < strlen($cliente_whatsapp) || $cliente_whatsapp[0] != 9) {
            $erro = 'Verfica o whatsapp inserido.';
        }

        if (!filter_var($cliente_email, FILTER_VALIDATE_EMAIL)) {
            $erro = 'O E-mail inserido não é válido';
        }

        $checkEmail = self::getInstance()->query("SELECT *FROM clientes WHERE cliente_email = '$cliente_email'");
        if ($checkEmail->rowCount() > 0) {
            $erro = 'O E-mail ' . $cliente_email . ' já está cadastrado';
        }

        $checkWhatsapp = self::getInstance()->query("SELECT *FROM clientes WHERE cliente_whatsapp = '$cliente_whatsapp'");
        if ($checkWhatsapp->rowCount() > 0) {
            $erro = 'O Whastapp ' . $cliente_whatsapp . ' já está cadastrado';
        }

        if (strlen($cliente_senha) <= 8) {
            $erro = 'A senha deve conter no mínimo 8 catacteres.';
        }

        /*   if (filter_var($mapGoole_cliente, FILTER_SANITIZE_URL)) {
            $erro = 'O link do Google map não é válido';
        } */

        return $erro;
    }

    # INSERE CLIENTE NA BASE DE DADOS;

    public static function create($cliente_nome, $cliente_telefone, $cliente_whatsapp, $cliente_email, $cliente_senha, $cliente_identificacao, $cliente_localizacao)
    {
        $erros = self::validateDate($cliente_nome, $cliente_telefone, $cliente_whatsapp, $cliente_email, $cliente_senha, $cliente_identificacao, $cliente_localizacao);

        $create = self::getInstance()->prepare("INSERT INTO clientes (cliente_nome, cliente_telefone, cliente_whatsapp, cliente_email, cliente_senha, cliente_identificacao, cliente_localizacao)
        VALUES(?,?,?,?,?,?,?)");

        $create->bindValue(1, $cliente_nome);
        $create->bindValue(2, $cliente_telefone);
        $create->bindValue(3, $cliente_whatsapp);
        $create->bindValue(4, $cliente_email);
        $create->bindValue(5, md5($cliente_senha));
        $create->bindValue(6, $cliente_identificacao);
        $create->bindValue(7, $cliente_localizacao);

        if (!$erros) {
            if ($create->execute()) {
                return ['status' => 'sucesso', 'msg' => 'Sucesso ao cadastrar'];
            } else {
                return ['status' => 'erro', 'msg' => 'Algo deu erro'];
            }
        } else {
            return ['status' => 'erro', 'msg' => $erros];
        }
    }

    /* PEGAR TODOS OS DADOS */
    public static function show($id_cliente)
    {
        $show = self::getInstance()->query("SELECT *FROM clientes WHERE idcliente = '$id_cliente'");
        return $show->fetch();
    }

    /* LOGIN */

    public static function login($cliente_email, $cliente_senha)
    {
        $selectEmail = self::getInstance()->query("SELECT cliente_email FROM clientes WHERE cliente_email = '" . $cliente_email . "'");
        if ($selectEmail->rowCount() > 0) {
            $selectPassord = self::getInstance()->query("SELECT cliente_senha FROM clientes WHERE cliente_senha = '" . $cliente_senha . "'");
            if ($selectPassord->rowCount() > 0) {
                $data = self::getInstance()->query("SELECT *FROM clientes WHERE cliente_email = '$cliente_email' AND cliente_senha = '$cliente_senha'");
                if ($data->rowCount() > 0) {
                    session_start();
                    $_SESSION['id-cliente'] = $data->fetch()->idcliente;

                    return ['status' => 'sucesso', 'msg' => 'Sucesso. Aguarde...'];
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
