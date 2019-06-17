<?php
  //Classe de acesso ao tipoentrega no banco de dados
  class tipoEntregaDAO{
    function __construct(){
    }
  //Função que realiza o cadastro de uma determinada entrega no bando de dados
  public function cadastrarEntrega($Entrega, $link){
    $query = "INSERT INTO `tipoentrega` VALUES ('%d', '%d', '%d')";
    $query = sprintf($query, $Entrega->getTipo(), $Entrega->getTempo(),$Entrega->getValor());

    if(!mysqli_query($link,$query)){
      die ("Não foi possível cadastrar".mysqli_error($link));
      }
    echo "Cadastro realizado com sucesso";
  }
    //Função que realiza a busca de um determinada entrega no banco de dados a partir do tipo
  public function buscarEntrega($umTipo,$link){
    $query = "SELECT * FROM `tipoEntrega` WHERE Tipo =".$umTipo;
    $r = mysqli_query($link, $query);

    if (!$r) {
      echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
      echo 'Erro MySQL: ' . mysqli_error();
      exit;
    }
    return $r;
  }
  //Função que realiza a exclusão de uma determinada entrega no banco de dados a partir do tipo
  public function excluirEntrega($tipo,$link){
    $query = "DELETE FROM `tipoentrega` WHERE tipo = '".$tipo."'";
    if(!mysqli_query($link,$query)){
      die ("Não foi possível excluir a entrega".mysqli_error($link));
    }
    echo "Entrega excluida com sucesso";
  }
  //Função que altera uma determinada entrega no banco de dados a partir do tipo
  public function alterarEntrega($tipo,$umaEntrega,$link){
    $query = "UPDATE `tipoentrega` SET tempo = '".$umaEntrega->getTempo()."', valorFrete = '".$umaEntrega->getValor()."'
    WHERE tipo = $tipo";
     if(!mysqli_query($link,$query)){
       die ("Não foi possível alterar a entrega".mysqli_error($link));
     }
     echo "Entrega alterado com sucesso";
  }
}



?>
