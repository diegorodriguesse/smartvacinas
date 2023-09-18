<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Alteração de Vacina</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <?php

        require "conexao.php";

        $id_vacina = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nome_vacina = filter_input(INPUT_POST, 'nome_vacina', FILTER_SANITIZE_STRING);
        $fabricante = filter_input(INPUT_POST, 'fabricante', FILTER_SANITIZE_STRING);
        $lote = filter_input(INPUT_POST, 'lote', FILTER_SANITIZE_STRING);
        $validade = filter_input(INPUT_POST, 'validade', FILTER_SANITIZE_STRING);

        $sql = "UPDATE vacina SET nome_vacina = '$nome_vacina', fabricante = '$fabricante' , lote = '$lote', validade = '$validade'  WHERE id_vacina='$id_vacina';";

        if(mysqli_query($connection, $sql)){
          mensagem ("Vacina $nome_vacina alterada com sucesso.", 'sucess');
        }

        else mensagem ("Erro ao alterar a Vacina $nome_vacina.", 'danger');

       ?>

        <a href = "vacina_tabela.php" class = "btn btn-primary"> Voltar </a>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>