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

<h3>Pacientes Cadastrados</h3>

             <nav class="navbar navbar-light bg-light">
              <div class="container-fluid">
                <form class="d-flex" action="paciente.php" method="POST">
                  <input class="form-control me-2" type="search" placeholder="Pesquisar Paciente" aria-label="Search" name = "busca">
                  <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
              </div>
            </nav>

            <table class="table">
              <thead class="table-dark">
                <tr>                  
                  <th scope="col">ID</th>
                  <th scope="col">Nome do Paciente</th>
                  <th scope="col">Nome Social</th>
                  <th scope="col">CPF</th>
                  <th scope="col">RG</th>
                  <th scope="col">Data de Nascimento</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
                
                    <?php
                      while ($linha = mysqli_fetch_assoc($dados)) {
                      
                      $id = $linha ['id'];
                      $nome = $linha['nome'];
                      $nome_social = $linha['nome_social'];
                      $cpf = $linha['cpf'];
                      $rg = $linha['rg']; 
                      $data_nascimento = $linha['data_nascimento'];

                           echo "<tr>
                                    <th scope='row'>$id</th>
                                    <td>$nome</td>
                                    <td>$nome_social </td>
                                    <td>$cpf</td>
                                    <td>$rg</td>
                                    <td>$data_nascimento</td>
                                    <td width=150px>
                                        <a href='paciente_edit_script.php?id=$id' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma_exclusao'
                                        onclick=" .'"' ."pegar_dados($id, '$nome', '$nome_social', '$cpf', '$rg', '$data_nascimento')" .'"' .">Excluir</a>
                                    </td>
                                </tr>";
                            }
                        ?>   

                        
           </tbody>
         </table>

             <a href = "index.php" class = "btn btn-danger"> Voltar para o Início </a>
             <a href = "paciente.php" class = "btn btn-secondary"> Cadastrar novo paciente </a>



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
            <form action = 'paciente_excluir.php' method="POST">
            <p>Deseja excluir esse paciente? <b id = "nome">Paciente</b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="nome" id="nome" value="">
              <input type="hidden" name="id" id="id" value="">
            <input type="submit" class="btn btn-danger" value='Sim'>
          </form>
          </div> 
        </div>
      </div>
    </div>
    

    <script type="text/javascript">
      function pegar_dados(id, nome) {
        document.getElementById('nome').innerHTML = nome;
        document.getElementById('nome').value = nome;
        document.getElementById('id').value = id;
        }
    </script>
    </div>