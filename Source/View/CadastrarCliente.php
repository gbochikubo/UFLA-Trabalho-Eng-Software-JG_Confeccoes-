<?php include_once("../Persistence/Connection.php");
      include_once("../Persistence/itemDAO.php");
      //Pagina responsavel pelo cadastramento de um cliente no sistema
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
    <!-- Monta o campo de preenchimento dos dados de cadastro -->
		<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
    <form class = "container" action = "../Controller/ControllerCliente/C_CadastrarCliente.php" method="post">
			Nome:<input type="text" name="nomeCliente"><br>
      Sexo:<input class="materialize-textarea" type="text" name="sexoCliente"><br>
			Cpf:<input type="text" name="cpfCliente"><br>
			Email:<input type="text" name="emailCliente"><br>
		  Endereco:<input type="text" name="enderecoCliente"><br>
      Tefone:<input type="text" name="telefoneCliente"><br>
			Senha:<input type="password" name="senhaCliente"><br>
			<input type="submit" class="waves-effect waves-light btn-small" value="Cadastrar Cliente">&nbsp
      <a class="waves-effect waves-light btn-small" href="../MainMenu.php">Voltar</a><br>
	  </form>
  </body>
</html>
