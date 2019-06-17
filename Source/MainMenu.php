<!DOCTYPE html>
<html lang="pt-br">
	<?php session_start();
		//if(isset($_GET['logout']) && $_GET['logout']=='true'){
	//		unset($_SESSION['usuario']);
	//		echo "SAIU";
	//	}
	 ?>
	<!--Página inicial do sistema-->
	<head>
		<meta charset="utf-8">
		<title> JG Confecções </title>
		<!-- stylesheet responsável pela estlização da página-->
		<link rel="stylesheet" href="View/Resource/materialize.css">
		<style media="screen">
		 	#cabecalho {
		 		display: inline;
				position:absolute;
				width: inherit;
				top:20px;
				right:10px;
			}
			.msg-error {
  		border-color: #d32f2f;
  		background-color: #ef5350;
  		color: white;
			}
			#login, #senha{float:left;}
			.input-fields {
				display: inline;
			}
		</style>
	</head>
	<body>
		<div class = "center-align">	<img src="View/Logo.png" class = "responsive-img"> </div>
		<ul>
			<div id="cabecalho">
				<?php
						if(isset($_SESSION['nao_autenticado'])): // verifica se o usuario não esta autenticado e aparece a msg
				?>
				<div class="msg msg-error z-depth-3 scale-transition"> Email ou senha inválidos </div>
				<?php
				endif;
				unset($_SESSION['nao_autenticado']); // reseta o não_autentuca para não aparecer a mensagem de erro de ligin
				?>
				<div class="row col s12">
				 <form  action = "Controller/C_ValidaLogin.php" method="post">
						 <div class="input-field inline col s5">
							 <input id="icon_prefix" type="text" class="validate" name="usuario" placeholder="Usuário">
						 </div>
						 <div class="input-field inline col s5">
							 <input id="icon_telephone" type="password" class="validate" name="senha" placeholder="Senha">
						 </div>
						 <div class="input-field inline col s2">
							 <div class="row input-fields">
								  <button type="submit" class="waves-effect waves-light btn-small"> Login</button>
									<a href="View/CadastrarCliente.php" class="waves-effect waves-light btn-small">Cadastrar</a>
							 </div>
						 </div>
				 </form>
			 </div>
		</ul>
	</body>
</html>
