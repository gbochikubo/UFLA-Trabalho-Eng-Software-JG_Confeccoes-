<?php
        //Página de administração do carrinho do cliente
    include_once("../Model/Item.php");
    include_once("../Persistence/Connection.php");
    include_once("../Persistence/itemDAO.php");
    include_once("../Controller/C_ControleLogin.php");

    $total = 0; //variavel que recebe o valor total da compra
    $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
    $conexao->conectar();
    $itemDAO = new itemDAO();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<!--Página inicial do sistema-->
	<head>
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
	</head>
	<body>
		<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
		<ul>
			<div id="cabecalho">
					<a id="alterarDados" class="waves-effect waves-light btn-small" href="AlterarDados.php">Alterar Dados</a>&nbsp
					<a id="login" class="waves-effect waves-light btn-small" href="../Controller/C_ControllerLogout.php">Sair</a>&nbsp
		 	</div>
		</ul>
    <?php if ($_SESSION["carrinho"]>0): ?>
    <div class = "container">
        <table style="width:100%" border="1" class = "highlight container">
          <thead>
            <tr>
              <th> Produto </th>
              <th> Preco </th>
							<th> Tamanho </th>
              <th> Preco </th>
							<th> Quantidade </th>
							<th> Atualizar </th>
							<th> Remover </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (array_keys($_SESSION['carrinho']) as $key): ?>
							<?php $resultado = mysqli_fetch_row($itemDAO-> buscarItemId($key, $conexao->getLink()));?>
                <tr>
                  <td><?= $resultado[0]?></td>
                  <td><?= $resultado[1] ?></td>
                  <td><?= $resultado[2] ?></td>
									<td><?= $resultado[4]* $_SESSION["carrinho"][$key]?></td>
									<?php	$total = $total+($resultado[4]* $_SESSION["carrinho"][$key])?>
									<td>
										<form  action = "../Controller/C_ControleCarrinho.php" method="get">
											<input id="novaQuantidade" name="novaQuantidade" type="number" min =1 placeholder="<?=$_SESSION["carrinho"][$key]?>">
											<input type="hidden" name ="operacao" value ="ALTERA" ?>
											<input type="hidden" name ="idItem" type="number" value ="<?= $key?>" >
										<td><button type="submit" class="waves-effect waves-light btn-small" >Atualizar</button></td>
										</form>
									</td>
										<form action = "../Controller/C_ControleCarrinho.php" method="get">
											<input type="hidden" name ="operacao" value ="REMOVE" ?>
											<input type="hidden" name ="idItem" type="number" value ="<?= $key?>" >
										<td><button type="submit" class="waves-effect waves-light btn-small">Remover</button></td>
									</form>
							</tr>
          <?php endforeach; ?>
          </tbody>
      <?php else: ?>
        <h4 class = "container">Não há registros cadastrados.</h4>
      <?php endif; ?>
		</div>
		<div id="cabecalho2">
				<a class="waves-effect waves-light btn-small"  href="./FinalizarCompra.php?valorTotal=<?php echo $total?>">Finalizar Compra</a>
				<a class="waves-effect waves-light btn-small"  href="./PerfilCliente.php">Voltar</a>
		</div>
		<th>Total: R$<?=$total?></th>
	</body>
</html>
