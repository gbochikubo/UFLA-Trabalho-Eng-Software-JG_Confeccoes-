<?php
  //Classe cliente referente ao cliente do sistema
  class Cliente{
    private $nome, $sexo, $cpf, $telefone, $endereco, $email, $senha;

    public function __construct($umNome, $umSexo, $umCpf, $umTelefone, $umEndereco, $umEmail, $umaSenha){
      $this->nome = $umNome;
      $this->sexo = $umSexo;
      $this->cpf = $umCpf;
      $this->telefone = $umTelefone;
      $this->endereco = $umEndereco;
      $this->email = $umEmail;
      $this->senha = $umaSenha;
    }
    public function getNome(){
      return $this->nome;
    }
    public function setNome($umNome){
      $this->nome = $umNome;
    }

    public function getSexo(){
      return $this->sexo;
    }
    public function setSexo($umSexo){
      $this->sexo = $umSexo;
    }

    public function getCpf(){
      return $this->cpf;
    }
    public function setCpf($umCpf){
      $this->cpf = $umCpf;
    }

    public function getTelefone(){
      return $this->telefone;
    }
    public function getTelefone($umTelefone){
      $this->telefone = $umTelefone ;
    }

    public function getEndereco(){
      return $this->endereco;
    }
    public function setEndereco($umEndereco){
      $this->umEndereco;
    }

    public function getEmail(){
      return $this->email;
    }
    public function setEmail($umEmail){
      $this->email = $umEmail;
    }

    public function getSenha(){
      return $this->senha;
    }
    public function setSenha($umaSenha){
      $this->senha = $umaSenha;
    }

  }






 ?>
