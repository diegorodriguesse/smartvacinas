<?php
    $pesquisa = $_POST['busca'] ?? '';
    include "conexao.php";

    $sql = "SELECT * FROM vacina WHERE nome_vacina LIKE '%$pesquisa%' ";
    $dados = mysqli_query($connection, $sql);

    $sql1 = "SELECT * FROM `campanhas`";
    $result1 = mysqli_query($connection, $sql1);
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

    <title>Vacinas Cadastradas</title>
  </head>
  <body>

          <h3>Vacinas Cadastradas</h3>

<nav class="navbar navbar-light bg-light">
 <div class="container-fluid">
   <form class="d-flex" action="vacina_tabela.php" method="POST">
     <input class="form-control me-2" type="search" placeholder="Pesquisar Vacina" aria-label="Search" name = "busca">
     <button class="btn btn-outline-success" type="submit">Pesquisar</button>
   </form>
 </div>
</nav>

<table class="table">
 <thead class="table-dark">
   <tr>                  
     <th scope="col">ID</th>
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
        // $nome_campanha = $linha['nome_campanha'];
         $nome_vacina = $linha['nome_vacina'];
         $fabricante = $linha['fabricante'];
         $lote = $linha['lote'];
         $validade = date("d/m/Y", strtotime($linha['validade']));


              echo "<tr>
                       <th scope='row'>$id_vacina</th>
                       <td>$nome_vacina</td>
                       <td>$fabricante</td>
                       <td>$lote</td>
                       <td>$validade</td>
                       <td width=150px>
                           <a href='vacina_edit.php?id=$id_vacina' class='btn btn-primary btn-sm'>Editar</a>
                           <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma_exclusao'
                           onclick=" .'"' ."pegar_dados($id_vacina, '$nome_vacina', '$fabricante', '$lote', '$validade')" .'"' .">Excluir</a>
                       </td>
                   </tr>";
               }
           ?>   

           
</tbody>
</table>
                    <a href="vacina.php" class="btn btn-secondary">Cadastrar nova vacina</a>

          <a href="index.php" class="btn btn-danger">Voltar para o Início</a>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma_exclusao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <!-- Conteúdo do modal aqui -->
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
