<?php
  //Classe item responsável pela instância de um item no sistema
  class TipoEntrega{
    private $tipo, $tempo, $valorFrete;

    public function __construct($umTipo,$umTempo,$umValor){
      $this->tipo = $umTipo;
      $this->tempo = $umTempo;
      $this->valorFrete = $umValor;
    }

    public function getTipo(){
      return $this->tipo;
    }

    public function setTipo($umTipo){
      $this->tipo = $umTipo;
    }

    public function getTempo(){
      return $this->tempo;
    }

    public function setTempo($umTempo){
      $this->tempo = $umTempo;
    }

    public function getValor(){
      return $this->valorFrete;
    }

    public function setValor($umValor){
      $this->valorFrete = $umValor;
    }

  }
 ?>
