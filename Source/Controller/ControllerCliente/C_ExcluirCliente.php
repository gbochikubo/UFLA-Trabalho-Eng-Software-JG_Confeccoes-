<?php include_once("../../Model/Cliente.php");
	  include_once("../../Persistence/Connection.php");
	  include_once("../../Persistence/clienteDAO.php");

		//Página de controle responsável pela exclusão de um determinado item
		session_start();
		$email = $_SESSION['usuario'];

		$conexao = new Connection("localhost","root","","jg_confeccoes");
		$conexao->conectar();

		$clienteDAO = new clienteDAO();
		$clienteDAO->excluirCliente($email,$conexao->getLink());

		header('Location: ../../MainMenu.php');
?>
