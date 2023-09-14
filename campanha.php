<?php
include "conexao.php";

$pesquisa = $_POST['busca'] ?? '';
$sql = "SELECT * FROM campanhas WHERE nome_campanha LIKE '%$pesquisa%'";
$dados = mysqli_query($connection, $sql);

?> 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Cadastro de Campanhas de Vacinação</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro de Campanhas</h1>

                <form action='campanha_cadastro_script.php' method="POST">
                    <div class="form-group">
                        <label for="nome_campanha" class="form-label">Nome da campanha</label>
                        <input type="text" class="form-control" id="nome_campanha" size="100" name="nome_campanha"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="sexo_paciente">Sexo do Paciente:</label>
                            <select id="sexo_paciente" name="sexo_paciente">
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="ambos">Ambos</option>
                            </select><br><br>
                    </div>

                    <?php 
                   if(isset($_GET['sexo_paciente']))
                   {
                       $sexo_paciente = strip_tags($_GET['sexo_paciente']);
                   } 
                   else
                   {
                       $sexo_paciente = false;
                   }
                    ?>

                    <div class="form-group">
                        <label for="idade_min" class="form-label">Idade Mínima do Paciente</label>
                        <input type="number" class="form-control" id="idade_min" size="5"
                            name="idade_min" required>
                    </div>

                    <div class="form-group">
                        <label for="idade_max" class="form-label">Idade Máxima do Paciente</label>
                        <input type="number" class="form-control" id="idade_max" size="5"
                            name="idade_max" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                        <a href="campanha_tabela.php" class="btn btn-danger">Voltar</a>
                    </div>

                    <div><br></div>

                </form>

</body>

</html>


