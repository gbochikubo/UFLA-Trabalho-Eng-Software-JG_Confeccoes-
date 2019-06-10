<?php
  //Classe item responsável pela instância de um item no sistema
  class Item{
    private $nome, $tamanho, $categoria, $preco,$quantidade;

    public function __construct($umNome,$umTamanho,$umaCategoria,$umPreco,$umaQuantidade){
      $this->nome = $umNome;
      $this->tamanho = $umTamanho;
      $this->categoria = $umaCategoria;
      $this->preco = $umPreco;
      $this->quantidade = $umaQuantidade;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setNome($umNome){
      $this->nome = $umNome;
    }

    public function getTamanho(){
      return $this->tamanho;
    }

    public function setTamanho($umTamanho){
      $this->tamanho = $umTamanho;
    }

    public function getCategoria(){
      return $this->categoria;
    }

    public function setCategoria($umaCategoria){
      $this->categoria = $umaCategoria;
    }

    public function getPreco(){
      return $this->preco;
    }

    public function setPreco($umPreco){
      $this->preco = $umPreco;
    }

    public function getQuantidade(){
      return $this->quantidade;
    }

    public function setQuantidade($umaQuantidade){
      $this->quantidade = $umaQuantidade;
    }

    //Função responsável pela impressão dos itens
    public function imprimirItem(){
      echo $this->nome." , ".$this->tamanho." , "
        .$this->categoria." , ".$this->preco." , ".$this->quantidade;
    }
  }
 ?>
