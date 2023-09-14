<?php

    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";
    $sql = "SELECT * FROM vacina WHERE nome_vacina LIKE '%$pesquisa%' ";
    $dados = mysqli_query($connection, $sql);

    $sql1 = "SELECT * FROM `campanhas`";
    $result1 = mysqli_query ($connection, $sql1);

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
          <h1>Cadastro de Vacina</h1> 

          <div class="form-group">
               <label for="nome_vacina" class="form-label">Nome da Campanha</label>
                <br>
                <select class="form-control" id="nome_campanha" name="nome_campanha" onchange="atualizarCampanhaSelecionada()">
               <?php while($row1 = mysqli_fetch_array($result1)):;?>
               <option value = "<?php echo $row1[1];?>"> <?php echo $row1[1];?></option>
               <?php endwhile;?>
            </select>
            </div>

            <input type="hidden" name="nome_campanha_selecionada" id="nome_campanha_selecionada">


            <form action = 'vacina_cadastro_script.php' method="POST">

             <div class="form-group">
               <label for="nome_vacina" class="form-label">Nome da Vacina</label>
               <input type="text" class="form-control" id="nome_vacina" size="100" name = "nome_vacina" required>
             </div>

             <form>
              <div class="form-group">
               <label for="fabricante" class="form-label">Fabricante</label>
               <input type="text" class="form-control" id="fabricante" size="100" name = "fabricante" required>
             </div>

             <form>
              <div class="form-group">
               <label for="lote" class="form-label">Lote</label>
               <input type="text" class="form-control" id="lote" size="11" name = "lote" required>
             </div>

             <form>
              <div class="form-group">
               <label for="validade" class="form-label">Validade</label>
               <input type="date" class="form-control" id="validade" size="11" name = "validade" required>
             </div>


             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-sucess">
              </div>

              <div> <br> </div>              
         

            </form>

            <h3>Vacinas Cadastradas</h3>


             <nav class="navbar navbar-light bg-light">
              <div class="container-fluid">
                <form class="d-flex" action="vacina.php" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Pesquisar Vacina" aria-label="Search" name = "busca">
                  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
              </div>
            </nav>

            <table class="table">
              <thead class="table-dark">
                <tr>                  
                  <th scope="col">ID</th>
                  <th scope="col">Nome da Campanha</th>
                  <th scope="col">Nome da Vacina</th>
                  <th scope="col">Fabricante</th>
                  <th scope="col">Lote</th>
                  <th scope="col">Validade</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
                
                    <?php
                      while ($linha = mysqli_fetch_assoc($dados)) {
                      $id_vacina = $linha ['id_vacina'];
                      $nome_campanha = $linha['nome_campanha'];
                      $nome_vacina = $linha['nome_vacina'];
                      $fabricante = $linha['fabricante'];
                      $lote = $linha['lote'];
                      $validade = $linha['validade'];


                           echo "<tr>
                                    <th scope='row'>$id_vacina</th>
                                    <td>$nome_campanha</td>
                                    <td>$nome_vacina</td>
                                    <td>$fabricante</td>
                                    <td>$lote</td>
                                    <td>$validade</td>
                                    <td width=150px>
                                        <a href='vacina_edit_script.php?id=$id_vacina' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma_exclusao'
                                        onclick=" .'"' ."pegar_dados($id_vacina, '$nome_campanha' , '$nome_vacina', '$fabricante', '$lote', '$validade')" .'"' .">Excluir</a>
                                    </td>
                                </tr>";
                            }
                        ?>   

                        
           </tbody>
         </table>

             <a href = "index.php" class = "btn btn-danger"> Voltar para o Início </a>


        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma_exclusao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirme a Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action = 'excluir_vacina.php' method="POST">
            <p>Deseja excluir essa vacina? <b id = "nome_vac">Vacina</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome_v" value="">
              <input type="hidden" name="id" id="id_vac" value="">
            <input type="submit" class="btn btn-danger" value='Sim'>
          </form>
          </div> 
        </div>
      </div>
    </div>
    

    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome_vac').innerHTML = nome;
        document.getElementById('nome_v').value = nome;
        document.getElementById('id_vac').value = id;
        }
    </script>

<script>
    function atualizarCampanhaSelecionada() {
        var campanhaSelecionada = document.getElementById('nome_campanha').value;
        document.getElementById('nome_campanha_selecionada').value = campanhaSelecionada;
    }
</script>

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