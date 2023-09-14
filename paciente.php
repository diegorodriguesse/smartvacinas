<?php
$pesquisa = $_POST['busca'] ?? '';
include "conexao.php";
$sql = "SELECT * FROM paciente WHERE nome LIKE '%$pesquisa%'";
$dados = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Paciente</h1>
        <form action="paciente_cadastro_script.php" method="POST">
            <div class="form-group">
                <label for="nome" class="form-label">Nome do Paciente</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="nome_social" class="form-label">Nome Social</label>
                <input type="text" class="form-control" id="nome_social" name="nome_social" required>
            </div>
            <div class="form-group">
                <label for="cpf" class="form-label">CPF</label>
                <input type="number" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="cep" class="form-label">CEP</label>
                <input type="number" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="form-group">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>
            <div class="form-group">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>
            <div class="form-group">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" required>
            </div>
           <!-- <div class="form-group">
                <label for="tipo_user" class="form-label">Tipo de Usuário</label>
                <input type="text" class="form-control" id="tipo_user" name="tipo_user" required>
            </div> -->
            <div class="form-group">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>

             <?php 
                   if(isset($_GET['sexo']))
                   {
                       $sexo = strip_tags($_GET['sexo']);
                   } 
                   else
                   {
                       $sexo = false;
                   }
            ?>
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Cadastrar">
                <a href = "paciente_tabela.php" class = "btn btn-danger"> Voltar </a>

            </div>
        </form>

</form>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>