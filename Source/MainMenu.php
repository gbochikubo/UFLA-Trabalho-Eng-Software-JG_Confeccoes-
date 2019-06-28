<!DOCTYPE html>
<html lang="pt-br">
	<?php session_start();

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }
     ?>
	<!--Página inicial do sistema-->
	<head>
		<meta charset="utf-8">
		<title> JG Confecções </title>
		<!-- stylesheet responsável pela estlização da página-->
		<link rel="stylesheet" href="View/Resource/materialize.css">
		<style media="screen">
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
				<?php
                        if (isset($_SESSION['nao_autenticado'])): //verificacao de login do usuario
                ?>
				<div class="msg msg-error z-depth-3 scale-transition"> Email ou senha inválidos </div>
				<?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>
				<div class="center-align">
				 <form  action = "Controller/C_ValidaLogin.php" class="center-align" method="post">
					 <input id="icon_prefix" type="text" class="validate" name="usuario" placeholder="Usuário"><br>
					 <input id="icon_telephone" type="password" class="validate" name="senha" placeholder="Senha"><br>
					 <button type="submit" class="waves-effect waves-light btn-small"> Login</button>
					 <a href="View/CadastrarCliente.php" class="waves-effect waves-light btn-small">Cadastrar</a>
				 </form>
			 </div>
		</ul>
	</body>
</html>
