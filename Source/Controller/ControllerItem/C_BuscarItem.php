<?php

		session_start();
		include_once("../../Model/Item.php");
	  include_once("../../Persistence/Connection.php");
	  include_once("../../Persistence/itemDAO.php");

    $umNome= $_POST['nomeItem'];

		$umItem = new Item($umNome, " ", " ", " ",0);

    $conexao = new Connection("localhost","root","","jg_confeccoes");
  	$conexao->conectar();

    $itemDAO = new itemDAO();
		$resultado = $itemDAO->buscarItem($umNome,$conexao->getLink());
		if(mysqli_num_rows($resultado) == 0){
			$_SESSION['busca'] = "Vazio";
			//HEADER -> Me redireciona para a outra pagina
			header('Location: ../../View/CadastrarItem.php');
			exit();
		}
		else{
			$openTable="<table style=\"width:100%\" border=\"1\">
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Tamanho</th>
					<th>Categoria</th>
					<th>Preco</th>
					<th>Quantidade</th>
					<th>Alterar</th>
				</tr>";

			$bodyTable = "";

				while($row = mysqli_fetch_row($resultado)){
						$bodyTable = $bodyTable."<tr>
							<td>".$row[0]."</td>
							<td>".$row[1]."</td>
							<td>".$row[2]."</td>
							<td>".$row[3]."</td>
							<td>".$row[4]."</td>
							<td>".$row[5]."</td>
							<td> <a href="."../View/AlterarItem.php?id=".$row[0].""."> <button>alterar</button><a/> </td>
						</tr>";
					}
				$closeTable ="</table>";

				$table = "<!DOCTYPE html>
						<html lang=\"pt-br\">

						<header>
						<meta charset=\"utf-8\">
						<title> Titulo </title>
						</header>

						<body>".$openTable.$bodyTable.$closeTable.


						"</body>

						</html>";

			$_SESSION['busca']=$table;
			header('Location: ../../View/PerfilAdm.php');

		}
		//$_SESSION["itens"] = serialize($x);
  //  header("Location: " . $_SERVER['HTTP_REFERER']);
?>
