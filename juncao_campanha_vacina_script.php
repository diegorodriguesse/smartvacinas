
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

$id_campanha_selecionada = $_POST['id_campanha_selecionada'];
$id_vacina_selecionada = $_POST['id_vacina_selecionada'];

$sql="INSERT INTO juncao_campanha_vacina (id_campanha, id_vacina) VALUES ('$id_campanha_selecionada', '$id_vacina_selecionada');";

    echo 'id_campanha: '; echo (int) $id_campanha_selecionada; 
    echo '   id_vacina:'; echo(int) $id_vacina_selecionada;


if(mysqli_query($connection, $sql)){
    mensagem ("A campanha foi vinculada à vacina com sucesso.", 'sucess');
    }
    else mensagem ("Erro ao vincular campanha à vacina .", 'danger');
?>
    <a href = "juncao_campanha_vacina.php" class = "btn btn-primary"> Voltar </a>
      </div>
    </div>
</html>




