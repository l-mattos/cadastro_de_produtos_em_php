<?php

require_once('Banco.class.php');

class Categoria{
    public $id;
    public $nome;

    public function Cadastrar(){
        $sql = "INSERT INTO categorias (nome) VALUES(?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->nome));
        Banco::desconectar();

    }
    public function Listar(){

        $banco = Banco::conectar();
        $sql = "SELECT * FROM categorias";
        $comando = $banco->prepare($sql);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;

    }
}

?>