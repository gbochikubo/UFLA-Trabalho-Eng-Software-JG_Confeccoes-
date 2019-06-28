<?php
// Pagina responsavel pelo logout do site
session_start(); // pega a seção para poder verificar se o usuario não esta autenticado
session_destroy(); // destroi as sessoes que foram utilizadas
header('Location: ../MainMenu.php');
exit();
