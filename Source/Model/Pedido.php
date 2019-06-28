<?php
  //Classe cliente referente ao pedido sistema
  class Pedido{
    private $status, $valor, $enderecoEntrega, $tipoEntrega, $clienteEmail;

    public function __construct($umStatus, $umValor, $umEnderecoEntrega, $umTipoEntrega, $umClienteEmail){
      $this->status = $umStatus;
      $this->valor = $umValor;
      $this->enderecoEntrega = $umEnderecoEntrega;
      $this->tipoEntrega = $umTipoEntrega;
      $this->clienteEmail = $umClienteEmail;
    }
    public function getIdPedido(){
      return $this->idPedido;
    }
    public function setIdPedido($umIdPedido){
      $this->idPedido = $umIdPedido;
    }

    public function getStatus(){
      return $this->status;
    }
    public function setStatus($umStatus){
      $this->status = $umStatus;
    }

    public function getValor(){
      return $this->valor
    }
    public function setValor($umValor){
      $this->valor = $umValor;
    }

    public function getEnderecoEntrega(){
      return $this->EnderecoEntrega;
    }

    public function setEnderecoEntrega($umEnderecoEntrega){
      $this->EnderecoEntrega = $umEnderecoEntrega;
    }

    public function getTipoEntrega(){
      return $this->TipoEntrega;
    }
    public function setTipoEntrega($umTipoEntrega){
      $this->TipoEntrega = $umTipoEntrega;
    }

    public function getClienteEmail(){
      return $this->ClienteEmail;
    }
    public function setEmail($umClienteEmail){
      $this->ClienteEmail = $umClienteEmail;
    }

  }
 ?>
