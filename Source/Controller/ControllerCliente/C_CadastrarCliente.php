<?php include_once("../../Model/Cliente.php");
	  include_once("../../Persistence/Connection.php");
	  include_once("../../Persistence/clienteDAO.php");
	//Página de controle responsável pelo cadastro de um determinado item
	$umNome= $_POST['nomeCliente'];
	$umSexo= $_POST['sexoCliente'];
  $umCpf= $_POST['cpfCliente'];
	$umEmail= $_POST['emailCliente'];
	$umEndereco= $_POST['enderecoCliente'];
  $umTelefone= $_POST['telefoneCliente'];
  $umaSenha= $_POST['senhaCliente'];

  $cliente = new Cliente($umNome, $umSexo, $umCpf, $umTelefone, $umEndereco, $umEmail, $umaSenha);

	$conexao = new Connection("localhost","root","","jg_confeccoes");
	$conexao->conectar();

	$clienteDAO = new clienteDAO();
	$clienteDAO->cadastrarCliente($cliente,$conexao->getLink());
	header('Location: ../../MainMenu.php');


?>
