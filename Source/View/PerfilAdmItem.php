<?php
        //Página de administração do sistema após ser realizado o login com a conta de funcionário
    include_once("../Model/Item.php");
    include_once("../Persistence/Connection.php");
    include_once("../Persistence/itemDAO.php");
    include_once("../Controller/C_LoginAdm.php");
        //Váriavel que recebe o resultado da busca de um determinado item
        $resultado = null;
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
		<!-- stylesheet responsável pela estlização da página -->
		<link rel="stylesheet" href="Resource/materialize.css">
	</header>
	<body>
		<div class = "center-align">	<img src="Logo.png" class = "responsive-img"> </div>
		<div id="cabecalho">
       <a class="waves-effect waves-light btn-small" href="PerfilAdm.php">Voltar</a>
			 <a id="logout" class="waves-effect waves-light btn-small" href="../MainMenu.php">Sair</a>
	 	</div>
    <!-- Monta campo de preenchimento de dados -->
		<form class = "container" action = "../Controller/ControllerItem/C_CadastrarItem.php" method="post">
			Nome:<input type="text" name="nomeItem"><br>
			Tamanho:<input type="text" name="tamanhoItem"><br>
			Categoria:<input type="text" name="categoriaItem"><br>
			Preco:<input class="materialize-textarea" type="text" name="precoItem"><br>
			Quantidade:<input type="number" name="quantidadeItem"><br>
			<input type="submit" class="waves-effect waves-light btn-small" value="Cadastrar Item">
	  </form>
		<form class = "container"  method="post">
			<input hidden type="text" name="op" value="busca">
			<br>Buscar Item:<input type="text" name="nomeItem">
			<input type = "submit" class="waves-effect waves-light btn-small" value = "Buscar Item">
		</form>
		<?php if (isset($_POST["op"])): ?>
			<!-- Monta a tabela caso exista o item buscado -->
			<?php if (mysqli_num_rows($resultado) > 0): ?>
        <div class = "container">
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
  										<a class="waves-effect waves-light btn-small" href="./AlterarItem.php?id=<?= $row[0] ?>">alterar</a>
  										<a class="waves-effect waves-light btn-small" href="../Controller/ControllerItem/C_ExcluirItem.php?IdItem=<?= $row[0] ?>">excluir</a>
  								  </td>
  								</tr>
  						<?php endwhile; ?>
  					</tbody>
  			<?php else: ?>
  				<h4 class = "container">Não há registros cadastrados.</h4>
  			<?php endif; ?>
  		<?php endif; ?>
    </div>
	</body>
</html>
