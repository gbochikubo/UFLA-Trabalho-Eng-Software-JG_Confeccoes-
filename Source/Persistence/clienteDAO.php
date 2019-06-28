<?php
  //Classe responsável pelo acesso aos dados do cliente no banco de dados
  class clienteDAO
  {
      public function __construct()
      {
      }

      public function cadastrarCliente($Cliente, $link)
      {
          $query = "INSERT INTO `Cliente` VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s','%d')";
          $query = sprintf(
              $query,
              $Cliente->getEmail(),
              $Cliente->getCpf(),
              $Cliente->getSexo(),
              $Cliente->getSenha(),
              $Cliente->getEndereco(),
              $Cliente->getNome(),
              $Cliente->getTelefone(),
              0
        );

          if (!mysqli_query($link, $query)) {
              die("Não foi possível cadastrar".mysqli_error($link));
          }
          echo "Cadastro realizado com sucesso";
      }

      public function alterarDados($Cliente, $link)
      {
          $query = "UPDATE `Cliente` SET email='%s',cpf='%s',sexo='%s',senha='%s',endereco='%s',nome='%s',telefone='%s' WHERE email ='%s' ";
          $query = sprintf(
              $query,
              $Cliente->getEmail(),
              $Cliente->getCpf(),
              $Cliente->getSexo(),
              $Cliente->getSenha(),
              $Cliente->getEndereco(),
              $Cliente->getNome(),
              $Cliente->getTelefone(),
              $Cliente->getEmail()
        );
          echo $query;
          if (!mysqli_query($link, $query)) {
              die("Não foi possível alterar os dados".mysqli_error($link));
          }
          echo "Dados alterados com sucesso";
      }

      public function excluirCliente($email, $link)
      {
          $query = "DELETE FROM `cliente` WHERE email= '".$email."'";
          if (!mysqli_query($link, $query)) {
              die("Não foi possível excluir a conta".mysqli_error($link));
          }
          echo "Conta excluida com sucesso";
      }

      public function buscarEndereco($umEmail, $link)
      {
          $query = "SELECT `Endereco` FROM `cliente` WHERE email= '".$umEmail."'";
          $r = mysqli_query($link, $query);
          if (!$r) {
              echo "\nErro do banco de dados, não foi possível consultar o banco de dados\n";
              echo 'Erro MySQL: ' . mysqli_error();
              exit;
          }
          return $r;
      }
  }
