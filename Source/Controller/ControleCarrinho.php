<?php
  session_start();

  $operacao = $_GET["operacao"];
  $item = $_GET["idItem"];

  switch ($operacao) {
    case 'ADICIONA':

      adicionarNoCarrinho($item);
      break;
    case 'REMOVE':
      removerDoCarrinho($item);
      break;
    case 'ALTERA':
      $novaQuantidade = $_GET["novaQuantidade"];
      alterarItemDoCarrinho($item, $novaQuantidade);
      break;
    default:
      break;
  }


  function adicionarNoCarrinho($item) {
    var_dump($_SESSION["carrinho"]);
    $_SESSION["carrinho"][$item] = 3;

    //header('Location: ../View/PaginaCarrinho.php');
  }

  function removerDoCarrinho($item, $quantidade) {}
  function alterarItemDoCarrinho($item, $novaQuantidade) {}
 ?>
