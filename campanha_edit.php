<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Editar Cadastro de Campanha</title>
  </head>
  <body>
       <div class="container">
      <div class="row">
        <div class="col">
          <h1>Edição de Campanha</h1>

            <form autocomplete ="off" action = 'campanha_edit_script.php' method="POST">
            <?php

              include_once "conexao.php";

              $id = $_GET['id'];
              $linha = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * from campanhas where id_campanha = '$id';"));

              //$sql = "SELECT * from campanhas where id_campanha = '$id'";
              //$dados = mysqli_query($connection, $sql);
              //$linha = mysqli_fetch_assoc($dados);

            ?>

            <input type="hidden" name="id" value= "<?php echo $linha['id_campanha'];?>">

             <div class="form-group">
               <label for="nome_campanha" class="form-label">Nome da Campanha</label>
               <input type="text" class="form-control" name = "nome_campanha" required value="<?php echo $linha['nome_campanha'];?>">
             </div>

            <div class="form-group">
                        <label for="sexo_paciente">Sexo do Paciente:</label>
                            <select id="sexo_paciente" name="sexo_paciente">
                                <option value="masculino"> <?php if($linha['sexo_paciente'] == 'masculino') echo "selected "; ?>Masculino</option>
                                <option value="feminino"> <?php if($linha['sexo_paciente'] == 'feminino') echo "selected "; ?>Feminino</option>
                                <option <?php echo $linha['sexo_paciente'] == 'ambos'? 'checked': ''; ?>value="ambos">  <?php if($linha['sexo_paciente'] == 'ambos') echo "selected "; ?>Ambos</option>
                            </select><br><br>
                    </div>

                    <?php 
                   if(isset($_GET['sexo_paciente']))
                   {
                       $sexo_paciente = strip_tags($_GET['sexo_paciente']);
                   } 
                   else
                   {
                       $sexo_paciente = false;
                   }
                  ?>

              <div class="form-group">
                        <label for="idade_min" class="form-label">Idade Mínima do Paciente</label>
                        <input type="number" class="form-control" id="idade_min" size="5"
                            name="idade_min" required value="<?php echo $linha['idade_min'];?>">
              </div>

                    <div class="form-group">
                        <label for="idade_max" class="form-label">Idade Máxima do Paciente</label>
                        <input type="number" class="form-control" id="idade_max" size="5"
                            name="idade_max" required value="<?php echo $linha['idade_max'];?>">
                    </div>
                                    
              <div> 
              <br> 
            </div>  

             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Salvar Alterações">

               <a href = "campanha_tabela.php" class = "btn btn-danger"> Voltar</a>
              </div>
            </form>

           </tbody>
         </table>



        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
   
       <!--
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>


<!--
//Carregar dados de uma tabela em uma caixa de select

<form>
              <div class="form-group">
               <label for="tipoProduto" class="form-label">Categoria</label>
               <input type="text" class="form-control" id="tipoProduto" size="100" name = "categoria" required> 
               <select name = categoria class="form-select" > 
                  <option>Selecione a categoria:</option>
                   <?php
                      //while ($linha1 = mysqli_fetch_assoc($dados1)) { ?>
                        <option value="<?php //echo $linha1['nome_categoria']; ?> "> <?php //echo $linha1['nome_categoria']; ?> </option> <?php 
                      //} 
                      ?>                        
               </select>
             </div>




Informar Status (sim/não)
  <form>
              <div class="form-group">
               <label for="ativo" class="form-label">Ativo</label>
               <select class="form-select" aria-label="Default select example">
                 <option value="0">SIM</option>
                 <option value="1">NÃO</option>
               </select>
             </div>

             -->