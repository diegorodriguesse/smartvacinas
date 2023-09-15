<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Editar Paciente</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
       <?php

       include "conexao.php";

       $id = $_POST['id'];
       $nome = $_POST['nome'];
       $nome_social = $_POST['nome_social'];
       $cpf = $_POST['cpf'];
       $rg = $_POST['rg'];
       $cep = $_POST['cep'];
       $endereco = $_POST['endereco']; 
       $estado = $_POST['estado']; 
       $cidade = $_POST['cidade']; 
       $bairro = $_POST['bairro']; 
       $sexo = $_POST['sexo'];
       $data_nascimento = $_POST['data_nascimento'];
       //$data_formatada = date("Y-m-d", strtotime($data_nascimento));
        //$sql = "INSERT INTO `paciente`(`nome`,`nome_social`,`cpf`,`rg` ,`cep`,`endereco`, `estado`, `cidade`, `bairro`, `data_nascimento`, `sexo` ) VALUES ('$nome', '$nome_social', '$cpf', '$rg', '$cep', '$endereco', '$estado', '$cidade', '$bairro','$data_nascimento', '$sexo');";
        $sql = "UPDATE paciente SET  nome = '$nome', nome_social = '$nome_social', cpf = '$cpf', rg = '$rg', cep = '$cep', endereco = '$endereco', estado = '$estado', cidade = '$cidade', bairro = '$bairro', sexo = '$sexo', data_nascimento = '$data_nascimento' WHERE id = '$id';";

       if(mysqli_query($connection, $sql)){
          mensagem (" O paciente $nome_social foi editado com sucesso.", 'sucess');
        }

        else mensagem ("Erro ao editar o paciente $nome_social.", 'danger');

       ?>

        <a href = "paciente_tabela.php" class = "btn btn-primary"> Voltar </a>


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