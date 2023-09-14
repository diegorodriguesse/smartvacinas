<?php
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";

    $aplicacao_vacina_sql = "SELECT * FROM aplicacao_vacina WHERE nome_paciente LIKE '%$pesquisa%' ";
    $dados_aplicacao = mysqli_query($connection, $aplicacao_vacina_sql);

    $campanhas_sql = "SELECT * FROM `vacina`";
    $dados_campanhas = mysqli_query($connection, $campanhas_sql);

    $vacina_sql = "SELECT * FROM vacina WHERE nome_campanha = atualizarCampanhaSelecionada.nome_campanha";
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
              <select class="form-control" id="nome_paciente" name="nome_paciente" onchange="atualizarPacienteSelecionado()" required>
                <?php while($row = mysqli_fetch_array($dados_paciente)):;?>
                <option value="<?php echo $row['nome_social']; ?>"><?php echo $row['nome_social']; ?></option>
                <?php endwhile; ?>
              </select>

              <input type="hidden" name="nome_paciente_selecionado" id="nome_paciente_selecionado" required>

              <div class="form-group">
              <label for="nome_campanha" class="form-label">Campanha</label>
              <br>
              <select class="form-control" id="nome_campanha" name="nome_campanha" onchange="carregarVacinas(this.value)" required>
                <?php while($row1 = mysqli_fetch_array($dados_campanhas)):;?>
                <option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
              </select>

              <input type="hidden" name="nome_campanha_selecionada" id="nome_campanha_selecionada" required>

            <div class="form-group">
              <label for="nome_vacina" class="form-label">Vacina</label>
              <br>
              <select class="form-control" id="nome_vacina" name="nome_vacina">
                <?php while($row2 = mysqli_fetch_array($dados_vacinas)):;?>
                <option value="<?php echo $row2[2]; ?>"><?php echo $row2[2]; ?></option>
                <?php endwhile; ?>
              </select>

              <input type="hidden" name="nome_vacina_selecionada" id="nome_vacina_selecionada">

              <input type="hidden" id="data_hora_aplicacao" name="data_hora_aplicacao" value="">

              <br>
              <div class="form-group">
              <input type="submit" class="btn btn-success">
              <a href="index.php" class="btn btn-danger">Voltar para o Início</a>


            </div>
          </form>

<script>
     function atualizarPacienteSelecionado() {
        var pacienteSelecionado = document.getElementById('nome_paciente').value;
        document.getElementById('nome_paciente_selecionado').value = pacienteSelecionado;
    }

    function dataHoraAplicacao() {
        var dataHora = new Date();
        document.getElementById('data_hora_aplicacao').value = dataHora.toISOString();
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