<?php include_once("../../Model/TipoEntrega.php");
	  include_once("../../Persistence/Connection.php");
	  include_once("../../Persistence/tipoEntregaDAO.php");

		//Página de controle responsável pela exclusao de uma determinada entrega
    $umTipo = $_GET['tipoEntrega'];

		$conexao = new Connection("localhost","root","","jg_confeccoes");
		$conexao->conectar();

 		$tipoEntregaDAO = new tipoEntregaDAO();
		$tipoEntregaDAO->excluirEntrega($umTipo,$conexao->getLink());

		header('Location: ../../View/PerfilAdmEntregas.php');
?>
