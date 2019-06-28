<?php
        //Página de administração de entregas do sistema após ser realizado o login com a conta de funcionário
    include_once("../Model/TipoEntrega.php");
    include_once("../Persistence/Connection.php");
    include_once("../Persistence/tipoEntregaDAO.php");
    include_once("../Controller/C_ControleLoginAdm.php");
        //Váriavel que recebe o resultado da busca de uma determinada entrega
        $resultado = null;
    if (isset($_POST["opEntrega"])) {
        $umTipo= $_POST['nomeEntrega'];
        $umaEntrega = new TipoEntrega($umTipo, 0, 0);

        $conexao = new Connection("localhost", "root", "", "jg_confeccoes");
        $conexao->conectar();

        $tipoEntregaDAO= new tipoEntregaDAO();
        $resultadoEntrega = $tipoEntregaDAO->buscarEntrega($umTipo, $conexao->getLink());
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
    <div class = "container">
  		<form class = "container" action = "../Controller/ControllerTipoEntrega/C_CadastraEntrega.php" method="post">
  			Tipo Entrega:<input type="number" name="tipoEntrega"><br>
  			Tempo de Entrega:<input type="number" name="tempoEntrega"><br>
  		  Valor Entrega:<input type="number" name="valorEntrega"><br>
  			<input type="submit" class="waves-effect waves-light btn-small" value="Cadastrar Entrega">
  	  </form>
  		<form class = "container"  method="post">
  			<input hidden type="number" name="opEntrega" >
  			<br>Buscar Entrega:<input type="number" required name="nomeEntrega">
  			<input type = "submit" class="waves-effect waves-light btn-small" value = "Buscar Entrega">
  		</form>
  		<?php if (isset($_POST["opEntrega"])): ?>
  			<!-- Monta a tabela caso exista a entrega buscado -->
  			<?php if (mysqli_num_rows($resultadoEntrega) > 0): ?>
          <div class = "container">
  				<table style="width:100%" border="1" class = "highlight container">
  					<thead>
  						<tr>
  							<th>Tipo</th>
  							<th>Tempo de Entrega</th>
  							<th>Valor Entrega</th>
                <th>Alterar/Excluir</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php while ($row = mysqli_fetch_row($resultadoEntrega)): ?>
  								<tr>
  									<td><?= $row[0] ?></td>
  									<td><?= $row[1] ?></td>
  									<td><?= $row[2] ?></td>
  									<td>
  										<a class="waves-effect waves-light btn-small" href="AlterarTipoEntrega.php?tipoEntrega=<?= $row[0] ?>">alterar</a>
  										<a class="waves-effect waves-light btn-small" href="../Controller/ControllerTipoEntrega/C_ExcluirEntrega.php?tipoEntrega=<?= $row[0] ?>">excluir</a>
                    </td>
  								</tr>
  						<?php endwhile; ?>
  					</tbody>
  			<?php else: ?>
  				<h4 class = "container">Não há registros cadastrados.</h4>
  			<?php endif; ?>
  		<?php endif; ?>
    </div>
  </div>
	</body>
</html>
