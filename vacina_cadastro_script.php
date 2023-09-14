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

        $nome_campanha_selecionada = $_POST['nome_campanha_selecionada'] ?? '';
        $nome_vacina = $_POST['nome_vacina'] ?? '';
        $fabricante = $_POST['fabricante'] ?? '';
        $lote = $_POST['lote'] ?? '';
        $validade = $_POST['validade'] ?? '';

        if ($nome_campanha_selecionada != '' && $nome_vacina != '' && $fabricante != '' && $lote != '' && $validade != '') {
            $sql = "INSERT INTO `vacina` (`nome_campanha`, `nome_vacina`, `fabricante`, `lote`, `validade`) 
                    VALUES ('$nome_campanha_selecionada', '$nome_vacina', '$fabricante', '$lote', '$validade');";

            if (mysqli_query($connection, $sql)) {
                mensagem("Vacina $nome_vacina cadastrada com sucesso.", 'success');
            } else {
                mensagem("Erro ao cadastrar a vacina $nome_vacina.", 'danger');
            }
        } else {
            mensagem("Por favor, preencha todos os campos.", 'danger');
        }
        ?>

        <a href="vacina.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://
