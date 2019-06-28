<!DOCTYPE html>
<?php
    include_once("../Controller/C_LoginAdm.php");

    //Página de alteração dos dados de um determinado item

    //Id referente ao item de alteração, recebido da tabela após clicar na opção alterar item
    $IdItem = $_GET["id"];
    $_SESSION['idItem']=$IdItem;
?>
<html lang="pt-br">
	<header>
		<meta charset="utf-8">
		<title> JG Confecções </title>
		<!-- stylesheet responsável pela estlização da página -->
		<link rel="stylesheet" href="Resource/materialize.css">
		<style media="screen">
			#cabecalho {
				position:absolute;
				top:10px;
				right:30px;
			}
		</style>
	</header>
	<body>
	  <div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
	  <form class="container" action = "../Controller/ControllerItem/C_AlterarItem.php" method="post">
			Nome:<input type="text" name="nomeItem"><br>
			Tamanho:<input type="text" name="tamanhoItem"><br>
			Categoria:<input type="text" name="categoriaItem"><br>
			Preco:<input type="text" name="precoItem"><br>
			Quantidade:<input type="number" name="quantidadeItem"><br>
			<input type="submit" class="waves-effect waves-light btn-small" value="Alterar Item">
	    <a href="PerfilAdmItem.php" class="waves-effect waves-light btn-small" >Voltar</a><br>
	  </form>
	</body>
</html>
