<?php

  // include_once("../../Model/Item.php");

  class ItemDAO{
    function __construct(){
    }

    public function cadastrarItem($Item,$link){
      $query = "INSERT INTO `Item` VALUES  (null, '".$Item->getNome()."','".$Item->getTamanho()."','".$Item->getCategoria()."','".$Item->getPreco()."','".$Item->getQuantidade()."',null);";
			echo $query;

      if(!mysqli_query($link,$query)){
        die ("Nãp foi possível cadastrar o item".mysqli_error($link));
      }
      echo "Item cadastrado com sucesso";
      }

      public function excluirItem($IdItem,$link){

        $query = "DELETE FROM `item` WHERE idItem = '".$IdItem."'";
        if(!mysqli_query($link,$query)){
          die ("Não foi possível excluir o item".mysqli_error($link));
        }
        echo "Item Excluido com sucesso";
      }

      public function buscarItem($nomeItem,$link){
        $query = "SELECT * FROM `item` WHERE Nome like '%".$nomeItem."%'";
        $r = mysqli_query($link, $query);
        if (!$r) {
  				echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
  				echo 'Erro MySQL: ' . mysqli_error();
  				exit;
  			}
  			return $r;
  		}

      public function alterarItem($umId,$Item,$link){
        $query = "UPDATE `item` SET Nome = '".$Item->getNome()."', Tamanho = '".$Item->getTamanho()."', Categoria = '".$Item->getCategoria()."'
        , Preco = '".$Item->getPreco()."', Quantidade = '".$Item->getQuantidade()."'
         WHERE idItem = $umId";
         if(!mysqli_query($link,$query)){
           die ("Não foi possível alterar o item".mysqli_error($link));
         }
         echo "Item alterado com sucesso";
      }
  }
?>
