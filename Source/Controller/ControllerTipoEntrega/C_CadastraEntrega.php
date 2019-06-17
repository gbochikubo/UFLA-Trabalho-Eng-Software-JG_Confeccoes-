<?php include_once("../../Model/TipoEntrega.php");
	  include_once("../../Persistence/Connection.php");
	  include_once("../../Persistence/tipoEntregaDAO.php");

		//Página de controle responsável pela alteração de uma determinada entrega
  	$umTempo= $_POST['tempoEntrega'];
    $umValor= $_POST['valorEntrega'];

    $entrega = new TipoEntrega($umTipo,$umTempo,$umValor);

    $conexao = new Connection("localhost","root","","jg_confeccoes");
    $conexao->conectar();

    $tipoEntregaDAO = new tipoEntregaDAO();
    $tipoEntregaDAO->cadastrarEntrega($entrega,$conexao->getLink());
    header('Location: ../../View/PerfilAdmEntregas.php');
?>
