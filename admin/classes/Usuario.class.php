<?php

require_once('Banco.class.php');

class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function Cadastrar(){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES(?,?,?)";

        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $hash = hash('sha256', $this->senha);

        $comando->execute(array($this->nome, $this->email, $hash));

        Banco::desconectar();

    }
    public function Logar(){

        $banco = Banco::conectar();
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $comando = $banco->prepare($sql);
        $hash = hash('sha256', $this->senha);

        $comando->execute(array($this->email, $hash));
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

        Banco::desconectar();
        return $resultado;

    }

    public function Listar(){

        $banco = Banco::conectar();
        $sql = "SELECT * FROM usuarios";
        $comando = $banco->prepare($sql);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    
    }
}

?>