<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require_once('../classes/Usuario.class.php');
    $u = new Usuario();
    $u->email = $_POST['email'];
    $u->senha = $_POST['senha'];

    $resultado = $u->Logar();

    if(count($resultado) == 1){
        session_start();
        $_SESSION['dados'] = $resultado[0];
        header("Location: ../painel.php");
        exit();
    }else{
        // echo"Usuário e senha inválidos!";
        header('Location: ../index.php?erro=0');
        exit();
    }

}else{
    echo "A página deve ser carregada por POST!";
}

?>