<?php
  //Classe responsável pelo acesso aos dados do pedido no banco de dados
  class pedidoDAO
  {
      public function __construct()
      {
      }

      public function cadastrarPedido($Pedido, $link)
      {
          $query = "INSERT INTO `pedido` VALUES ('%d', '%s', '%d', '%s', '%d', '%s')";
          $query = sprintf(
              $query,
              $Pedido->getIdPedido(),
              $Pedido->getStatus(),
              $Pedido->getValor(),
              $Pedido->getEnderecoEntrega(),
              $Pedido->getTipoEntrega(),
              $Pedido->getClienteEmail()
        );

          if (!mysqli_query($link, $query)) {
              die("Não foi possível cadastrar".mysqli_error($link));
          }
          echo "Cadastro realizado com sucesso";
      }
  }
