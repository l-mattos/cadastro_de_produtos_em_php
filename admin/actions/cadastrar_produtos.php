<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){

require_once('../classes/Produto.class.php');

$p = new Produto();

$p->nome = $_POST['nome'];
$p->descricao = $_POST['descricao'];
$p->preco = $_POST['preco'];
$p->estoque = $_POST['estoque'];

$p->foto = "semfoto.jpg";

if(is_uploaded_file($_FILES['foto']['tmp_name'])){
    $validos = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novo_nome = hash_file('md5',$_FILES['foto']['tmp_name']).".$ext";
    if(in_array($ext, $validos)){
        move_uploaded_file($_FILES['foto']['tmp_name'], "../../img/$novo_nome");
        $p->foto = $novo_nome;
    }else{
        echo "$ext não é permitido.";
        exit();
    }
}

$p->id_categoria = $_POST['id_categoria'];
$p->id_usuario = $_SESSION['dados']['id'];

$p->Cadastrar();


header('Location: ../painel.php?msg=5');
exit();
}else{
echo "Essa página deve ser carregada com POST!"; 
}

?>