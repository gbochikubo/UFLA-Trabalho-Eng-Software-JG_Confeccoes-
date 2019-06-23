
<?php include_once("../Controller/C_ControleLogin.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<!--Página inicial do sistema-->
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
					<a id="login" class="waves-effect waves-light btn-small" href="../MainMenu.php">Sair</a>&nbsp
		 	</div>
		</ul>
    <?php if (mysqli_num_rows($_SESSION["carrinho"]) > 0): ?>
      <div class = "container">
        <table style="width:100%" border="1" class = "highlight container">
          <thead>
            <tr>
              <th> Produto </th>
              <th> Preco </th>
              <th> Quantidade </th>

            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_row($_SESSION["carrinho"])): ?>
                <tr>
                  <td><?= $row[0] ?></td>
                  <td><?= $row[1] ?></td>
                  <td><?= $row[2] ?></td>
                  <td><?= $row[3] ?></td>
                  <td><input id="quantidadeItens" type="number" size = "auto"></td>
                  <td>
                    <a class="waves-effect waves-light btn-small" href="../Controller/ControleCarrinho.php?operacao=ADICIONA&idItem=<?= $row[0] ?>">Adicionar ao carrinho</a>
                  </td>
                </tr>
            <?php endwhile; ?>
          </tbody>
      <?php else: ?>
        <h4 class = "container">Não há registros cadastrados.</h4>
      <?php endif; ?>
			</div>
	</body>
</html>
