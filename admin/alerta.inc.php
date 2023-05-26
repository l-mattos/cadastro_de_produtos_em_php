<?php

$msg = [
    "Cadastro realizado com sucesso!", 
    "Produto cadastrado com sucesso!",
    "Produto excluido com sucesso!",
    "Produto atualizado com sucesso!",
    "Tchau Tchau...",
    "Produto cadastrado com sucesso!"
];

$erro = [
    "Usuário ou senha inválidos!",
    "Falha ao realizar seu cadastro, verefique as informações digitadas!",
    "Falha ao cadastrar produto.",
    "Falha ao excluir produto.",
    "Falha ao atualizar produto."
];



?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    <?php if(isset($_GET['erro'])){ ?>
    swal("Erro!", "<?= $erro[$_GET['erro']]; ?>", "error"); 
    window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>  
    
    <?php if(isset($_GET['msg'])){ ?>
    swal("Sucesso!", "<?= $msg[$_GET['msg']]; ?>", "success"); 
    window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>

    
</script>