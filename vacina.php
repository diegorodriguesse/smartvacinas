<?php
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";

    $sql = "SELECT * FROM vacina WHERE nome_vacina LIKE '%$pesquisa%' ";
    $dados = mysqli_query($connection, $sql);

    //$sql1 = "SELECT * FROM `campanhas`";
    //$result1 = mysqli_query($connection, $sql1);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Cadastro de Vacina</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col">
        <div class="col">
          <h1>Cadastro de Vacina</h1> 

          <form action="vacina_cadastro_script.php" method="POST">
             <!-- <div class="form-group">
              <label for="nome_campanha" class="form-label">Nome da Campanha</label>
              <br>
              
            <select class="form-control" id="nome_campanha" name="nome_campanha" onchange="atualizarCampanhaSelecionada()">
                <?php while($row1 = mysqli_fetch_array($result1)):;?>
                <option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
              </select>
            

             <input type="hidden" name="nome_campanha_selecionada" id="nome_campanha_selecionada">
             -->
            
            <div class="form-group">
              <label for="nome_vacina" class="form-label">Nome da Vacina</label>
              <input type="text" class="form-control" id="nome_vacina" size="100" name="nome_vacina" required>
            </div>

            <div class="form-group">
              <label for="fabricante" class="form-label">Fabricante</label>
              <input type="text" class="form-control" id="fabricante" size="100" name="fabricante" required>
            </div>

            <div class="form-group">
              <label for="lote" class="form-label">Lote</label>
              <input type="text" class="form-control" id="lote" size="11" name="lote" required>
            </div>

            <div class="form-group">
              <label for="validade" class="form-label">Validade</label>
              <input type="date" class="form-control" id="validade" size="11" name="validade" required>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Cadastrar">
              <a href="vacina_tabela.php" class="btn btn-danger">Voltar</a>
              <br>
            </div>
          </form>
          
        </div>
      </div>
    </div>

<!--<script>
    function atualizarCampanhaSelecionada() {
        var campanhaSelecionada = document.getElementById('nome_campanha').value;
        document.getElementById('nome_campanha_selecionada').value = campanhaSelecionada;
    }
</script>--
-->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
