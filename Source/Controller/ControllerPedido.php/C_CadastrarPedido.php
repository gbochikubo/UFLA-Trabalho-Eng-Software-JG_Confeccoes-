<?php include_once("../../Model/pedido.php");
      include_once("../../Persistence/Connection.php");
      include_once("../../Persistence/pedidoDAO.php");

    //Página de controle responsável pela realizacao de um pedido
    $numCartao= $_POST['numCartao'];
    $nomeCartao= $_POST['nomeCartao'];
    $dataCartao= $_POST['dataCartao'];
    $codigoCartao= $_POST['codigoCartao'];
    $tipoEntrega= $_POST['nomeCartao'];

    $entrega = new TipoEntrega($umTipo, $umTempo, $umValor);

    $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
    $conexao->conectar();

    $tipoEntregaDAO = new tipoEntregaDAO();
    $tipoEntregaDAO->cadastrarEntrega($entrega, $conexao->getLink());
    header('Location: ../../View/PerfilAdmEntregas.php');
