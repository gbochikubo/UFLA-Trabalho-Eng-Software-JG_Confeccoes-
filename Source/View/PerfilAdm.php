<?php
	session_start();
//	echo "UPDATE `item` SET 'Nome ='".$Item->getNome()."';";
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<header>
	<meta charset="utf-8">
	<title> JG Confecções </title>
</header>
<body>
	<h1> JG Confecções </h1>
	<form action = "../Controller/ControllerItem/C_CadastrarItem.php" method="post">
		Nome:<input type="text" name="nomeItem"><br>
		Tamanho:<input type="text" name="tamanhoItem"><br>
		Categoria:<input type="text" name="categoriaItem"><br>
		Preco:<input type="float" name="precoItem"><br>
		Quantidade:<input type="number" name="quantidadeItem"><br>
		<input type="submit" value="Cadastrar Item">
  </form>

	<form action = "../Controller/ControllerItem/C_ExcluirItem.php" method = "post">
		IdItem:<input type = "number" name = "IdItem"><br>
		<input type = "submit" value = "Excluir Item"><br><br>
	</form>

	<form action = "../Controller/ControllerItem/C_BuscarItem.php" method="post">
		Buscar Item:<input type="text" name="nomeItem"><br>
		<input type = "submit" value = "Buscar Item">
		<a href="../MenuAdmin.php">Voltar</a><br><br>
	</form>
	<?php
		if (empty($_SESSION['busca'])){
			echo "Vazio";
		}
		else if($_SESSION['busca'] == "Vazio"){
			echo "Item não encontrado";
		}
		else{
			echo $_SESSION['busca'];
			unset($_SESSION['busca']);
		}
	 ?>
</body>
</html>
