<!DOCTYPE html>
<?php
	include_once("../Controller/C_ControleLogin.php");
	//Página de alteração dos dados de uma determinada entrega

	//Tipo referente ao TipoEntrega de alteração, recebido da tabela após clicar na opção alterar entrega
	$tipo = $_GET["tipoEntrega"];
	$_SESSION['entrega']=$tipo;
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
	  <form class="container" action = "../Controller/ControllerTipoEntrega/C_AlterarEntrega.php" method="post">
      Tempo de Entrega:<input type="number" name="tempoEntrega"><br>
      Valor Entrega:<input type="number" name="valorEntrega"><br>
			<input type="submit" class="waves-effect waves-light btn-small" value="Alterar Entrega">
	    <a href="PerfilAdmEntregas.php" class="waves-effect waves-light btn-small" >Voltar</a><br>
	  </form>
	</body>
</html>
