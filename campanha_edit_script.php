<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Alteração de Categoria</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <?php

        require "conexao.php";

       /* $id_campanha = $_POST['id'];
        $nome_campanha = $_POST['nome_campanha'];
        $sexo_paciente = $_POST['sexo_paciente'];
        $idade_min = $_POST['idade_min'];
        $idade_max = $_POST['idade_max'];  
        */    

        $id_campanha = filter_input(INPUT_POST, 'id_campanha', FILTER_SANITIZE_NUMBER_INT);
        $nome_campanha = filter_input(INPUT_POST, 'nome_campanha', FILTER_SANITIZE_STRING);
        $sexo_paciente = filter_input(INPUT_POST, 'sexo_paciente', FILTER_SANITIZE_STRING);
        $idade_min = filter_input(INPUT_POST, 'idade_min', FILTER_SANITIZE_NUMBER_INT);
        $idade_max = filter_input(INPUT_POST, 'idade_max', FILTER_SANITIZE_NUMBER_INT);

        $sql = "UPDATE `campanhas` SET `nome_campanha`='$nome_campanha', `nome_campanha`='$nome_campanha', `sexo_paciente`='$sexo_paciente', `idade_min`='$idade_min', 'idade_max' = '$idade_max'  WHERE `id_campanha`='$id_campanha';";

        if(mysqli_query($connection, $sql)){
          mensagem ("Campanha $nome_campanha alterada com sucesso.", 'sucess');
        }

        else mensagem ("Erro ao alterar a campanha $nome_campanha.", 'danger');

       ?>

        <a href = "campanha_tabela.php" class = "btn btn-primary"> Voltar </a>


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