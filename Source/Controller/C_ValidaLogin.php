<?php
  session_start();
  include_once("../Persistence/Connection.php");


  $conexao = new Connection("localhost","root","","jg_confeccoes");
  $conexao->conectar();

  //Dados de usuário, senha e flag para verificação de funcionário
  $usuario = $_POST["usuario"];
  $senha = $_POST["senha"];
  $funcionario = 1;

  #Caso usuário e senha não existam o usuário continua na tela de MainMenu
  if(empty($usuario) || empty($senha)){
    header('Location: ../MainMenu.php');
    exit();
  }

  $queryFuncionario= "SELECT * FROM `Cliente` WHERE email = '".$usuario."' and senha = '".$senha."' and
  funcionario='".$funcionario."'";
  $query= "SELECT * FROM `Cliente` WHERE email = '".$usuario."' and senha = '".$senha."' " ; // busca no banco o usuario e senha

  $consultaFuncionario=mysqli_query($conexao->getLink(),$queryFuncionario);
  $consulta=mysqli_query($conexao->getLink(),$query);

  //Verifica se é um funcionário e se os dados de email e senha são validos, caso sejá é redirecionado para a
  //tela de PerfilAdm
  if(mysqli_num_rows($consultaFuncionario)==1){
    header('Location: ../View/PerfilAdm.php');
    exit();
  }
  else{
  //Caso usuário e senha existam e estejam corretos, o cliente é enviado para a tela após o login efetuado
    if(mysqli_num_rows($consulta)==1){
      $_SESSION['usuario']=$usuario;
      header('Location: ../View/PerfilCliente.php');
      exit();
    }
  //Caso contrário ele continua na tela de MainMenu
    else{
      $_SESSION['nao_autenticado']=true;
      header('Location: ../MainMenu.php');
      exit();
    }
  }
?>
