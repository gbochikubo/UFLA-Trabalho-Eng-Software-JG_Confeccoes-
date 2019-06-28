<?php
  //Classe cliente referente ao pedido sistema
  class Pedido
  {
      private $status;
      private $valor;
      private $enderecoEntrega;
      private $tipoEntrega;
      private $clienteEmail;

      public function __construct($umStatus, $umValor, $umEnderecoEntrega, $umTipoEntrega, $umClienteEmail)
      {
          $this->status = $umStatus;
          $this->valor = $umValor;
          $this->enderecoEntrega = $umEnderecoEntrega;
          $this->tipoEntrega = $umTipoEntrega;
          $this->clienteEmail = $umClienteEmail;
      }

      public function getStatus()
      {
          return $this->status;
      }
      public function setStatus($umStatus)
      {
          $this->status = $umStatus;
      }

      public function getValor()
      {
          return $this->valor;
      }
      public function setValor($umValor)
      {
          $this->valor = $umValor;
      }

      public function getEnderecoEntrega()
      {
          return $this->enderecoEntrega;
      }

      public function setEnderecoEntrega($umEnderecoEntrega)
      {
          $this->tnderecoEntrega = $umEnderecoEntrega;
      }

      public function getTipoEntrega()
      {
          return $this->tipoEntrega;
      }
      public function setTipoEntrega($umTipoEntrega)
      {
          $this->tipoEntrega = $umTipoEntrega;
      }

      public function getClienteEmail()
      {
          return $this->clienteEmail;
      }
      public function setEmail($umClienteEmail)
      {
          $this->clienteEmail = $umClienteEmail;
      }
  }
