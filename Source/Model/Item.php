<?php

  class Item{
    var $nome, $tamanho, $categoria, $preco,$quantidade;

    function __construct($umNome,$umTamanho,$umaCategoria,$umPreco,$umaQuantidade){
      $this->nome = $umNome;
      $this->tamanho = $umTamanho;
      $this->categoria = $umaCategoria;
      $this->preco = $umPreco;
      $this->quantidade = $umaQuantidade;
    }

    function getNome(){
      return $this->nome;
    }

    function setNome($umNome){
      $this->nome = $umNome;
    }

    function getTamanho(){
      return $this->tamanho;
    }

    function setTamanho($umTamanho){
      $this->tamanho = $umTamanho;
    }

    function getCategoria(){
      return $this->categoria;
    }

    function setCategoria($umaCategoria){
      $this->categoria = $umaCategoria;
    }

    function getPreco(){
      return $this->preco;
    }

    function setPreco($umPreco){
      $this->preco = $umPreco;
    }

    function getQuantidade(){
      return $this->quantidade;
    }

    function setQuantidade($umaQuantidade){
      $this->quantidade = $umaQuantidade;
    }
    function imprimirItem(){
      echo $this->nome." , ".$this->tamanho." , "
        .$this->categoria." , ".$this->preco." , ".$this->quantidade;
    }


  }

 ?>
