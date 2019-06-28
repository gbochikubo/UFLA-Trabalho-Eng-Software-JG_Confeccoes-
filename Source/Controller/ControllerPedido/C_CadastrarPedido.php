<?php include_once("../../Model/Pedido.php");
      include_once("../../Persistence/Connection.php");
      include_once("../../Persistence/pedidoDAO.php");
      include_once("../../Model/Cliente.php");
      include_once("../../Persistence/clienteDAO.php");
    //Página de controle responsável pela realizacao de um pedido
    session_start();
    $email = $_SESSION['usuario'];
    echo $email;
    $valorTotal= $_SESSION['valor'];
    $tipoEntrega= $_POST['tipoEntrega'];

    $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
    $conexao->conectar();

    $clienteDAO = new clienteDAO();
    $endereco = $clienteDAO->buscarEndereco($email, $conexao->getLink());
    $pedido = new Pedido("Em espera", $valorTotal, $valorTotal, $endereco, $tipoEntrega, $email);



    $pedidoDAO = new pedidoDAO();
    $pedidoDAO->cadastrarPedido($pedido, $conexao->getLink());
    header('Location: ../../View/PerfilCliente.php');
