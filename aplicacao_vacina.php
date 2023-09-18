<?php
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";

    //$aplicacao_vacina_sql = "SELECT * FROM aplicacao_vacina WHERE nome_paciente LIKE '%$pesquisa%' ";
    //$dados_aplicacao = mysqli_query($connection, $aplicacao_vacina_sql);

    $campanhas_sql = "SELECT * FROM `juncao_campanha_vacina`";
    $dados_campanhas = mysqli_query($connection, $campanhas_sql);

    $vacina_sql = "SELECT * FROM juncao_campanha_vacina WHERE id_campanha = atualizarCampanhaSelecionada.nome_campanha";
    $dados_vacinas = mysqli_query($connection, $vacina_sql);

    $paciente_sql = "SELECT * FROM `paciente` ORDER BY nome_social";
    $dados_paciente = mysqli_query($connection, $paciente_sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Aplicação  de Vacinas</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Aplicação  de Vacinas</h1>

          <form action="aplicacao_vacina_script.php" method="POST">

          <div class="form-group">
              <label for="nome_paciente" class="form-label">Paciente</label>
              <br>
              <select class="form-control" id="nome_social" name="nome_social" onchange="atualizarPacienteSelecionado()" required>
                <?php while($row = mysqli_fetch_array($dados_paciente)):;?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nome_social']; ?></option>
                <?php endwhile; ?>
              </select>

              <input type="hidden" name="id_paciente_selecionado" id="id_paciente_selecionado" required>

              <div class="form-group">
              <label for="nome_campanha" class="form-label">Campanha</label>
              <br>
              <select class="form-control" id="id_campanha" name="id_campanha" onchange="carregarVacinas(this.value)" required>
                <?php while($row1 = mysqli_fetch_array($dados_campanhas)):;?>
                <option value="<?php echo $row1['id_campanha']; ?>"><?php echo $row1['id_campanha']; ?></option>
                <?php endwhile; ?>
              </select>

              <input type="hidden" name="id_campanha_selecionada" id="id_campanha_selecionada" required>

            <div class="form-group">
              <label for="nome_vacina" class="form-label">Vacina</label>
              <br>
              <select class="form-control" id="id_vacina" name="id_vacina">
                <?php while($row2 = mysqli_fetch_array($dados_vacinas)):;?>
                <option value="<?php echo $row2['id_vacina']; ?>"><?php echo $row2['id_vacina']; ?></option>
                <?php endwhile; ?>
              </select>

              <input type="hidden" name="id_vacina_selecionada" id="id_vacina_selecionada">

              <br>
              <div class="form-group">
              <input type="submit" class="btn btn-success" value = "Registrar aplicação da vacina">
              <a href="index.php" class="btn btn-danger">Voltar para o Início</a>


            </div>
          </form>

<script>
     function atualizarPacienteSelecionado() {
        var pacienteSelecionado = document.getElementById('nome_social').value;
        document.getElementById('id_paciente_selecionado').value = pacienteSelecionado;
    }

    function carregarVacinas(campanhaSelecionada) {
        $.ajax({
            url: 'buscar_vacinas.php', 
            type: 'POST',
            data: { campanhaSelecionada: campanhaSelecionada },
            success: function(data) {
              $('#nome_vacina').html(data);
            },
            error: function() {
                alert('Ocorreu um erro ao buscar as vacinas.');
            }
        });
    }
</script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>