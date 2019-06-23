<?php include_once("../Persistence/Connection.php");
      include_once("../Persistence/itemDAO.php");
      include_once("../Controller/C_ControleLogin.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

  <header>
    <meta charset="utf-8">
    <title> JG Confecções </title>
    <!-- stylesheet responsável pela estlização da página -->
    <link rel="stylesheet" href="Resource/materialize.css">
  </header>
  <body>
		<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
    <form class = "container" action = "../Controller/ControllerCliente/C_AlterarDados.php" method="post">
			Nome:<input type="text" name="nomeCliente"><br>
      Sexo:<input class="materialize-textarea" type="text" name="sexoCliente"><br>
			Cpf:<input type="text" name="cpfCliente"><br>
		  Endereco:<input type="text" name="enderecoCliente"><br>
      Tefone:<input type="text" name="telefoneCliente"><br>
			Senha:<input type="password" name="senhaCliente"><br>
      <input class="waves-effect waves-light btn-small" type="submit" value="Alterar Dados">&nbsp
      <a class="waves-effect waves-light btn-small" href="../Controller/ControllerCliente/C_ExcluirCliente.php">Excluir Conta</a>&nbsp
      <a class="waves-effect waves-light btn-small" href="PerfilCliente.php">Voltar</a><br>
	  </form>
  </body>
</html>
