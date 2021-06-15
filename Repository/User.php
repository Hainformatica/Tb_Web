<?php

namespace app\Repository;
require "Conexao.php";
class User {
    public $CPF;
    public $Name;
    public $Email;
    public $Password;

    public function __construct($CPF, $Name, $Email, $Password) {
        $this->CPF=$CPF;        
        $this->Name=$Name;
        $this->Email=$Email;
        $this->Password=$Password;
    }

    public function Save($user) {
        try{
            $minhaConexao = Conexao::getConexao();

            if($user->cpf == null){
                $sql = $minhaConexao->prepare(
                    "INSERT INTO usuario (CPF, Nome, Email, Senha) 
                     VALUES (:nome,:email,:cpf,:senha)"
                );
                $sql->bindParam(":nome",$this->Nome);
                $sql->bindParam(":email",$this->Email);
                $sql->bindParam(":cpf",$this->CPF);
                $sql->bindParam(":senha",$this->Senha);
                $sql->execute();

            }else{
                $sql = $minhaConexao->prepare(
                    "UPDATE SET "
                    "usuario set nome = :nome, email = :email, senha = :senha
                     where cpf = :cpf"
                );
                $sql->bindParam(":nome",$this->Nome);
                $sql->bindParam(":email",$this->Email);
                $sql->bindParam(":cpf",$this->CPF);
                $sql->bindParam(":senha",$this->Senha);
                $sql->execute();
            }

            return true;
        }
        catch(PDOException $e) {
            echo $e->getmessage();
            return false;
        }
    }

}