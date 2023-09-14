<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Editar Cadastro de Vacina</title>
  </head>
  <body>
    <?php

        include "conexao.php";

        $id = $_GET['id'] ?? '';
        $sql = "SELECT * from vacina where id_vacina = '$id'";
        $dados = mysqli_query($connection, $sql);
        $linha = mysqli_fetch_assoc($dados);
        
    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Edição de Categoria de Produtos</h1>

          <div class="form-group">
               <label for="nome_vacina" class="form-label">Nome da Campanha</label>
                <br>
               <select class="form-control" id="'nome_campanha'" name="'nome_campanha'" required value="<?php echo $linha['nome_campanha'];?>"> 
               <?php while($row1 = mysqli_fetch_array($result1)):;?>
               <option><?php echo $row1[1];?></option>
               <?php endwhile;?>
            </select>
            </div>

            <?php 
                   if(isset($_GET['nome_campanha']))
                   {
                       $campanha = strip_tags($_GET['nome_campanha']);
                   } 
                   else
                   {
                       $campanha = false;
                   }
            ?>

            <form action = 'vacina_edit_script.php' method="POST">
             <div class="form-group">
               <label for="nome_vacina" class="form-label">Nome da Vacina</label>
               <input type="text" class="form-control" name = "nome_vacina" required value="<?php echo $linha['nome_vacina'];?>">
             </div>

            <div class="form-group">
               <label for="fabricante" class="form-label">Fabricante</label>
               <input type="text" class="form-control" name = "fabricante" required value="<?php echo $linha['fabricante'];?>">
             </div>

             <div class="form-group">
               <label for="lote" class="form-label">Lote</label>
               <input type="text" class="form-control" name = "lote" required value="<?php echo $linha['lote'];?>">
             </div>
              
              <div class="form-group">
               <label for="validade" class="form-label">Validade</label>
               <input type="date" class="form-control" name = "validade" required value="<?php echo $linha['validade'];?>">
             </div>
              
            <div> <br> </div>  

             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Salvar Alterações">
                <input type="hidden" name="id" value= "<?php echo $linha['id_vacina'] ?>">

               <a href = "vacina.php" class = "btn btn-danger"> Voltar</a>
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