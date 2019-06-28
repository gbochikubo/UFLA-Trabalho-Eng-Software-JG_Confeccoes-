<?php $valorTotal = $_GET["valorTotal"];
  //pagina responsavel pela finalizacao de uma compra e realizamento do pedido
 ?>
<!DOCTYPE html>
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
			#cabecalho2 {
				position:absolute;
				bottom:10px;
				right:250px;
			}

			.opcoes{
				display: flex;
				justify-content: space-between;
				flex-direction:
			}
		</style>
	</header>
	<body>
		<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
		<ul>
			<div id="cabecalho">
					<a id="alterarDados" class="waves-effect waves-light btn-small" href="AlterarDados.php">Alterar Dados</a>&nbsp
					<a id="login" class="waves-effect waves-light btn-small" href="../Controller/C_ControllerLogout.php">Sair</a>&nbsp
		 	</div>
		</ul>
    <form class = "container" action = "../Controller/ControllerPedido/C_CadastrarPedido.php" method="post">
      Numero Cartao:<input type="text" placeholder="Numero Cartao" name="numCartao"><br>
      Nome no Cartao:<input type="text" placeholder="Nome no Cartao" name="nomeCartao"><br>
      Data Expiracao:<input type="date" name="dataCartao"><br>
      Cod. Seguranca:<input type="text" placeholder="Codigo de Seguranca" name="codigoCartao"><br>
      TipoEntrega:<input type="number" name="tipoEntrega" min=1 max=3><br>
      <th> Total: R$<?=$valorTotal?></th><br><br>
      <input type="submit" class="waves-effect waves-light btn-small" value="Finalizar Compra">&nbsp
      <a class="waves-effect waves-light btn-small" href="../PerfilCliente.php">Cancelar Compra</a><br>
    </form>

	</body>
</html>
