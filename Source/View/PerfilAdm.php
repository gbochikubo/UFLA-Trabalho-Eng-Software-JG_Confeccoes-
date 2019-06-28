<?php
        //Página de administração do sistema após ser realizado o login com a conta de funcionário
    include_once("../Controller/C_LoginAdm.php");

        //Váriavel que recebe o resultado da busca de um determinado item
?>

<!DOCTYPE html>
<html lang="pt-br">
	<header>
		<style media="screen">
			#cabecalho {
				position:absolute;
				top:10px;
				right:30px;
			}

      .opcoes{
        display: flex;
        justify-content: space-between;
        flex-direction:
      }
		</style>
		<meta charset="utf-8">

		<title> JG Confecções </title>
		<!-- stylesheet responsável pela estlização da página -->
		<link rel="stylesheet" href="Resource/materialize.css">
	</header>
	<body>
		<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
		<div id="cabecalho">
      <form  action = "../Controller/C_ControllerLogout.php" method="post">
         <button type="submit" class="waves-effect waves-light btn-small"> Sair</button>
      </form>
	 	</div>
    <div class="row">
      <div class = "container opcoes">
        <a class="waves-effect waves-light btn-small"  href="./PerfilAdmItem.php">Gerenciar Itens</a>
        <a class="waves-effect waves-light btn-small"  href="./PerfilAdmEntregas.php">Gerenciar Entregas</a>
        <a class="waves-effect waves-light btn-small"  href="./PerfilAdmRelatorio.php">Gerar Relatorio</a>
      </div>
    </div>
	</body>
</html>
