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
                <h3>Campanhas Cadastradas</h3>

                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" action="campanha.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Pesquisar campanha"
                                aria-label="Search" name="busca">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome da campanha</th>
                            <th scope="col">Sexo do paciente</th>
                            <th scope="col">Idade mínima do paciente</th>
                            <th scope="col">Idade máxima do paciente</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $id_campanha = $linha['id_campanha'];
                            $nome_campanha = $linha['nome_campanha'];
                            $sexo_paciente = $linha['sexo_paciente'];
                            $idade_min = $linha['idade_min'];
                            $idade_max = $linha['idade_max'];

                            echo "<tr>
                                    <th scope='row'>$id_campanha</th>
                                    <td>$nome_campanha</td>
                                    <td>$sexo_paciente</td>
                                    <td>$idade_min</td>
                                    <td>$idade_max</td>
                                    <td width='150px'>
                                        <a href='campanha_edit.php?id=$id_campanha' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma_exclusao'
                                            onclick=\"pegar_dados($id_campanha, '$nome_campanha', '$sexo_paciente', $idade_min, $idade_max)\">Excluir</a>
                                    </td>
                                </tr>";
                        }
                        ?>

                    </tbody>
                </table>

                <a href="index.php" class="btn btn-danger">Voltar para o Início</a>
                <a href="campanha.php" class="btn btn-secondary">Cadastrar nova campanha</a>


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
                    <form action='excluir_campanha.php' method="POST">
                        <p>Deseja excluir essa campanha? <b id="nome_vac">campanha</b></p>
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
        function pegar_dados(id, nome, sexo, idade_min, idade_max) {
            document.getElementById('nome').innerHTML = nome;
            document.getElementById('nome').value = nome;
            document.getElementById('id').value = id;
        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    -->
</body>

</html>


