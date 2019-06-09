<?php
    $resultado = null;
    include_once("../Model/Item.php");
    include_once("../Persistence/Connection.php");
    include_once("../Persistence/itemDAO.php");
    if (isset($_POST["op"])) {
        $umNome= $_POST['nomeItem'];

        $umItem = new Item($umNome, " ", " ", " ", 0);

        $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
        $conexao->conectar();
        $itemDAO = new itemDAO();
        $resultado = $itemDAO->buscarItem($umNome, $conexao->getLink());
    }
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
	</style>
	<meta charset="utf-8">
	<title> JG Confecções </title>
	<link rel="stylesheet" href="Resource/materialize.css">
</header>
<body>
	<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
	<div id="cabecalho">
		 <a id="logout" href="../MainMenu.php" >Sair</a>
 	</div>

	<form class = "container" action = "../Controller/ControllerItem/C_CadastrarItem.php" method="post">
		Nome:<input type="text" name="nomeItem"><br>
		Tamanho:<input type="text" name="tamanhoItem"><br>
		Categoria:<input type="text" name="categoriaItem"><br>
		Preco:<input class="materialize-textarea" type="text" name="precoItem"><br>
		Quantidade:<input type="number" name="quantidadeItem"><br>
		<input type="submit" value="Cadastrar Item">
  </form>

	<form class = "container"  method="post">
		<input hidden type="text" name="op" value="busca">
		<br>Buscar Item:<input type="text" name="nomeItem">
		<input type = "submit" value = "Buscar Item">
	</form>
	<?php if (isset($_POST["op"])): ?>
		<?php if (mysqli_num_rows($resultado) > 0): ?>
			<table style="width:100%" border="1" class = "highlight container">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Tamanho</th>
						<th>Categoria</th>
						<th>Preco</th>
						<th>Quantidade</th>
						<th>Alterar/Excluir</th>
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
								<td><?= $row[5] ?></td>
								<td>
									<a href="./AlterarItem.php?id=<?= $row[0] ?>"><button>alterar</button></a>
									<a href="../Controller/ControllerItem/C_ExcluirItem.php?IdItem=<?= $row[0] ?>"><button>excluir</button></a>
							  </td>
							</tr>
					<?php endwhile; ?>
				</tbody>
		<?php else: ?>
			<h2>Não há registros cadastrados.</h2>
		<?php endif; ?>
	<?php endif; ?>
</body>
</html>
