<!DOCTYPE html>
<?php
session_start();
$IdItem = $_GET["id"];
$_SESSION['id']=$IdItem;
?>
<html lang="pt-br">

<header>
	<meta charset="utf-8">
	<title> JG Confecções </title>
</header>
<body>
  <h1> JG Confecções </h1>
  <form action = "../Controller/ControllerItem/C_AlterarItem.php" method="post">

		Nome:<input type="text" name="nomeItem"><br>
		Tamanho:<input type="text" name="tamanhoItem"><br>
		Categoria:<input type="text" name="categoriaItem"><br>
		Preco:<input type="float" name="precoItem"><br>
		Quantidade:<input type="number" name="quantidadeItem"><br>
		<input type="submit" value="Alterar Item">
    <a href="CadastrarItem.php">Voltar</a><br><br>
  </form>
</body>
</html>
