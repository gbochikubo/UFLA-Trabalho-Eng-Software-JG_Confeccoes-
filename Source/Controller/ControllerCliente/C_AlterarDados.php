<?php include_once("../../Model/Cliente.php");
      include_once("../../Persistence/Connection.php");
      include_once("../../Persistence/clienteDAO.php");

        //Página de controle responsável pela alteração de um determinado item
    session_start();
    $email = $_SESSION['usuario'];

    $umCpf= $_POST['cpfCliente'];
    $umSexo= $_POST['sexoCliente'];
    $umaSenha= $_POST['senhaCliente'];
    $umEndereco= $_POST['enderecoCliente'];
    $umNome = $_POST['nomeCliente'];
    $umTelefone = $_POST['telefoneCliente'];
    $Cliente = new Cliente($umNome, $umSexo, $umCpf, $umTelefone, $umEndereco, $email, $umaSenha);

    $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
    $conexao->conectar();

    $clienteDAO = new clienteDAO();
    $clienteDAO->alterarDados($Cliente, $conexao->getLink());
        header('Location: ../../View/PerfilCliente.php');
