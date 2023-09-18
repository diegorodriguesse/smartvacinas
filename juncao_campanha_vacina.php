<?php
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";

    //$sql = "SELECT * FROM vacina WHERE nome_vacina LIKE '%$pesquisa%' ";
    //$dados = mysqli_query($connection, $sql);

    $sql_campanhas = "SELECT id_campanha, nome_campanha FROM `campanhas`";
    $dados_campanhas = mysqli_query($connection, $sql_campanhas);

    $sql_vacina = "SELECT id_vacina, nome_vacina FROM `vacina`";
    $dados_vacinas = mysqli_query($connection, $sql_vacina);

    
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

    <title>Composicao de Campanhas</title>
  </head>
  <body>
   <h4> *Utilize esta tela para vincular as vacinas as campanhas cadastradas. </h4>

    <div class="container">
      <div class="row">
        <div class="col">
        <div class="col">
          <h1>Composicao de Campanhas</h1> 

          <form action= "juncao_campanha_vacina_script.php" method="POST">
             <div class="form-group">
              <label for="nome_campanha" class="form-label">Nome da Campanha</label>
              <br>
              <br>
              
            <select class="form-control" id="nome_campanha" name="nome_campanha" onchange="atualizarCampanhaSelecionada()">
                <?php while($linha_campanhas = mysqli_fetch_assoc($dados_campanhas)):;?>
                <option value="<?php echo $linha_campanhas['id_campanha']; ?>"><?php echo $linha_campanhas['nome_campanha'];?></option>
                <?php endwhile; ?>
              </select>
            
             <input type="hidden" name="id_campanha_selecionada" id="id_campanha_selecionada">
            
            <div class="form-group">
              <label for="nome_vacina" class="form-label">Nome da Vacina</label>
              <br>

              <select class="form-control" id="nome_vacina" name="nome_vacina" onchange="atualizarVacinaSelecionada()">
              <?php while($linha_vacinas = mysqli_fetch_assoc($dados_vacinas)):;?>
                <option value="<?php echo $linha_vacinas['id_vacina']; ?>"><?php echo $linha_vacinas['nome_vacina']; ?></option>
                <?php endwhile; ?>
              </select>
            
             <input type="hidden" name="id_vacina_selecionada" id="id_vacina_selecionada">

            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-success" value = 'Vincular'>
              <a href="juncao_campanha_vacina_tabela.php" class="btn btn-danger">Voltar</a>
              <br>
            </div>
          </form>
          
        </div>
      </div>
    </div>

<script>
    function atualizarCampanhaSelecionada() {
        var idCampanhaSelecionada = document.getElementById('nome_campanha').value;
        document.getElementById('id_campanha_selecionada').value = idCampanhaSelecionada;
    }
    function atualizarVacinaSelecionada() {
        var idVacinaSelecionada = document.getElementById('nome_vacina').value;
        document.getElementById('id_vacina_selecionada').value = idVacinaSelecionada;
    }
</script>--
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
