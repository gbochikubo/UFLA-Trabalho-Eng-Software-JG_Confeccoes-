<?php
  //Pagina responsavel pelas operacoes de controle do carrinho no sistema
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
      alterarItemDoCarrinho($item, intval($novaQuantidade));
      break;
    default:
      break;
  }


  function adicionarNoCarrinho($item)
  {
      var_dump($_SESSION["carrinho"]);
      $_SESSION["carrinho"][$item] = 1;

      header('Location: ../View/PerfilCliente.php');
  }

  function removerDoCarrinho($item)
  {
      unset($_SESSION["carrinho"][$item]);
      header('Location: ../View/PaginaCarrinho.php');
  }
  function alterarItemDoCarrinho($item, $novaQuantidade)
  {
      var_dump($_SESSION["carrinho"]);
      $_SESSION["carrinho"][$item] = $novaQuantidade;
      echo $item;
      echo $novaQuantidade;
      var_dump($_SESSION["carrinho"]);
      header('Location: ../View/PaginaCarrinho.php');
  }
