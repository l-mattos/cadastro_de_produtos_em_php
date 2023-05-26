<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){

require_once('../classes/Categoria.class.php');

$c = new Categoria();

$c->nome = $_POST['nome'];

$c->Cadastrar();

header('Location: ../painel.php?msg=1');
exit();
}else{
echo "Essa página deve ser carregada com POST!"; 
}

?>