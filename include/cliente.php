<?php
    session_start();
    
    function login(){

        $user = selectUsuario("SELECT id_usuario, nm_login_email, nm_senha,"
                . " ic_situacao_conta_ativa_desativada,"
                . " nm_login_email, nm_dica_senha, ds_tipo_usuario"
                . " FROM usuario"
                . " WHERE nm_login_email = ? AND nm_senha = ?;",TRUE);
        $_SESSION["usuario.login"] = $user->login;
        $_SESSION["usuario.tipo"] = $user->tipo;
        $_SESSION["loginAtivo"] = TRUE;
    }
   
    function logout(){
        unset($_SESSION["loginAtivo"]);
        unset($_SESSION["usuario.login"]);
        unset($_SESSION["usuario.tipo"]);
    }
    function cadastrarCliente(){
        $SQL = "INSERT INTO cliente (USUARIO_id_usuario, nm_cliente,"
                . " dt_nacimento, cd_telefone_residencial, cd_telefone_celular,"
                . " cd_telefone_comercial, nm_logradouro, nm_complemento,"
                . " nm_bairro, nm_cidade, nm_estado)"
                . " VALUES (?,?,?,?,?,?,?,?,?,?,?);";
        
        insertCliente($SQL);
    }
?>