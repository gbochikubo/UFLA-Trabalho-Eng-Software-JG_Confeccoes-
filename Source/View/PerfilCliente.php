<?php
        //Página de administração do sistema após ser realizado o login com a conta de Cliente
    include_once("../Model/Item.php");
    include_once("../Persistence/Connection.php");
    include_once("../Persistence/itemDAO.php");
    include_once("../Controller/C_ControleLogin.php");

    $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
    $conexao->conectar();

    $itemDAO = new itemDAO();
    $resultado = $itemDAO->buscarTodosItens($conexao->getLink());
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
          <form  action = "../Controller/C_ControllerLogout.php" method="post">
						  <button type="submit" class="waves-effect waves-light btn-small"> Sair</button>
          </form>
		 	</div>
		</ul>
			<div class="row">
				<div class = "container opcoes" class ="container">
					<a class="waves-effect waves-light btn-small"  href="./PerfilAdmItem.php">Camisetas</a>
					<a class="waves-effect waves-light btn-small"  href="./PerfilAdmEntregas.php">Calcas</a>
						<a class="waves-effect waves-light btn-small"  href="./PerfilAdmRelatorio.php">Bermudas</a>
					<a class="waves-effect waves-light btn-small"  href="./PerfilAdmRelatorio.php">Tenis</a>
					<a class="waves-effect waves-light btn-small"  href="./PerfilAdmRelatorio.php">Moletons</a>
					<a class="waves-effect waves-light btn-small"  href="./PerfilAdmRelatorio.php">Jaquetas</a>
				</div>
			</div>
			<?php if (mysqli_num_rows($resultado) > 0): ?>
				<div class = "container">
					<table style="width:100%" border="1" class = "highlight container">
						<thead>
							<tr>
								<th> id </th>
								<th>Nome</th>
								<th>Tamanho</th>
								<th>Categoria</th>
								<th>Preco</th>
								<th>Adicionar item ao carrinho</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_row($resultado)): ?>
									<tr>
										<td><?= $row[0] ?></td>
										<td><?= $row[1] ?></td>
										<td><?= $row[2] ?></td>
										<td><?= $row[3] ?></td>
										<td><?= $row[4] ?></td>
										<td>
											<a class="waves-effect waves-light btn-small" href="../Controller/C_ControleCarrinho.php?operacao=ADICIONA&idItem=<?= $row[0] ?>">Adicionar ao carrinho</a>
										</td>
									</tr>
							<?php endwhile; ?>
						</tbody>
				<?php else: ?>
					<h4 class = "container">Não há registros cadastrados.</h4>
				<?php endif; ?>
		</div>
    <div id="cabecalho2">
        <a class="waves-effect waves-light btn-small"  href="./PaginaCarrinho.php">Ir para Carrinho</a>
    </div>

	</body>
</html>
