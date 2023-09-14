<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Cadastro</title>
  </head>
  <body>

    <div class="container">
      <div class="row">

<?php

include "conexao.php";

$nome_campanha = $_POST['nome_campanha'];
$sexo_paciente = $_POST['sexo_paciente'];
$idade_min = $_POST['idade_min'];
$idade_max = $_POST['idade_max'];

$sql = "INSERT INTO campanhas (nome_campanha, sexo_paciente, idade_min, idade_max)
VALUES ('$nome_campanha', '$sexo_paciente', '$idade_min', '$idade_max')";


 if(mysqli_query($connection, $sql)){
          mensagem (" A campanha $nome_campanha foi cadastrado com sucesso.", 'sucess');
        }

        else mensagem ("Erro ao cadastrar campanha $nome_campanha.", 'danger');

       ?>

        <a href = "campanha.php" class = "btn btn-primary"> Voltar </a>


      </div>
    </div>
</html>
