<?php

session_start();
$erro = "";

$erro = "";

if (isset($_SESSION['dados'])) {
  if (isset($_GET['id'])) {

    require_once('classes/Produto.class.php');
    $c = new Produto();
    $c->id = $_GET['id'];

    $resultado = $c->BuscarPorID();

    if (count($resultado) == 0) {
      $erro = "Contato não encontrado!";
    }
  } else {
    $erro = "ID não setado!";
  }
} else {
  $erro = "Realize o login primeiro";
}


require_once('classes/Categoria.class.php');
$c = new Categoria();
$categorias = $c->Listar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulário de Edição</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <?php if ($erro == "") { ?>
      <h1>Editar</h1>
      <form action="actions/editar_produto.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fotoProduto">Foto</label>
          <input type="hidden" value="<?= $resultado[0]["foto"] ?>" name="fotoantiga">
          <input name="foto" type="file" class="form-control-file" id="fotoProduto">
        </div>
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input value="<?= $resultado[0]["nome"] ?>" type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <input value="<?= $resultado[0]["descricao"] ?>" type="descricao" class="form-control" id="descricao" name="descricao">
        </div>
        <div class="form-group">
          <label for="id_categoria">Categoria:</label>
          <select class="form-control" id="categoriaProduto" name="id_categoria">

            <?php foreach ($categorias as $categorias) { ?>

              <option value="<?= $categorias['id']; ?>"><?= $categorias['nome']; ?></option>

            <?php } ?>

          </select>
        </div>
        <div class="form-group">
          <label for="estoque">Estoque:</label>
          <input value="<?= $resultado[0]["estoque"] ?>" type="text" class="form-control" id="estoque" name="estoque">
        </div>
        <div class="form-group">
          <label for="preco">Preço:</label>
          <input value="<?= $resultado[0]["preco"] ?>" type="number" step="0.01" class="form-control" id="preco" name="preco">
        </div>
        <input value="<?= $resultado[0]["id"] ?>" type="hidden" name="id" id="id">
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>

    <?php } else { ?>
      <h1><?= $erro; ?></h1>
    <?php } ?>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>