<?php include_once("../../Model/Item.php");
	  include_once("../../Persistence/Connection.php");
	  include_once("../../Persistence/itemDAO.php");

    session_start();
    $umId = $_SESSION['id'];

    $umNome= $_POST['nomeItem'];
  	$umTamanho= $_POST['tamanhoItem'];
    $umaCategoria= $_POST['categoriaItem'];
  	$umPreco= $_POST['precoItem'];
  	$umaQuantidade = $_POST['quantidadeItem'];

    $item = new Item($umNome,$umTamanho,$umaCategoria,$umPreco,$umaQuantidade);

    $conexao = new Connection("localhost","root","","jg_confeccoes");
    $conexao->conectar();

    $itemDAO = new itemDAO();
    $itemDAO->alterarItem($umId,$item,$conexao->getLink());
    header('Location: ../../View/CadastrarItem.php');

  ?>
