<?php
// Página de controle com funcão de não deixar determinado usuário acessar uma página que não tenha permissão
	session_start();
	if(!($_SESSION['usuario'] == 'Admin@hotmail.com') or !($_SESSION['usuario'])){
		header('Location: ../MainMenu.php');
	  	exit();
	}
?>
