<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <title>Editar Cadastro de Paciente</title>
  </head>
  <body>
    <?php

        include "conexao.php";

        $id = $_GET['id'] ?? '';
        $sql = "SELECT * from paciente where id = '$id'";
        $dados = mysqli_query($connection, $sql);
        $linha = mysqli_fetch_assoc($dados);
        
    ?>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Edição de Cadastro de Paciente</h1>

            <form action = 'paciente_edicao_script.php' method="POST">
              <div class="form-group">
               <label for="nome_vacina" class="form-label">Nome do Paciente</label>
               <input type="text" class="form-control" id="nome" size="100" name = "nome" required value="<?php echo $linha['nome'];?>">
             </div>

             <form>
              <div class="form-group">
               <label for="nome_social" class="form-label">Nome Social</label>
               <input type="text" class="form-control" id="nome_social" size="100" name = "nome_social" required value="<?php echo $linha['nome_social'];?>">
             </div>

            <form>
              <div class="form-group">
               <label for="cpf" class="form-label">CPF</label>
               <input type="number" class="form-control" id="cpf" size="11" name = "cpf" required value="<?php echo $linha['cpf'];?>">
             </div>

             <form>
              <div class="form-group">
               <label for="rg" class="form-label">rg</label>
               <input type="text" class="form-control" id="rg" size="15" name = "rg" required value="<?php echo $linha['rg'];?>">
             </div>


             <form>
              <div class="form-group">
               <label for="data_nascimento" class="form-label">Data de Nascimento</label>
               <input type="date" class="form-control" id="data_nascimento" size ="11" size="100" name = "data_nascimento" required value="<?php echo $linha['data_nascimento'];?>">
             </div>

             <form>
              <div class="form-group">
               <label for="cep" class="form-label">cep</label>
               <input type="number" class="form-control" id="cep" size ="11" size="100" name = "cep" required value="<?php echo $linha['cep'];?>">
             </div>

             <form>
              <div class="form-group">
               <label for="endereco" class="form-label">endereço</label>
               <input type="text" class="form-control" id="endereco" size="11" name = "endereco"required value="<?php echo $linha['endereco'];?>">
             </div>

             <form>
              <div class="form-group">
               <label for="estado" class="form-label">estado</label>
               <input type="text" class="form-control" id="estado" size="11" name = "estado" required value="<?php echo $linha['estado'];?>">
             </div>

                <form>
              <div class="form-group">
               <label for="cidade" class="form-label">cidade</label>
               <input type="text" class="form-control" id="cidade" size="11" name = "cidade" required value="<?php echo $linha['cidade'];?>">
             </div>

                <form>
              <div class="form-group">
               <label for="bairro" class="form-label">bairro</label>
               <input type="text" class="form-control" id="bairro" size="11" name = "bairro" required value="<?php echo $linha['bairro'];?>">
             </div>

           <!--     <form>
              <div class="form-group">
               <label for="tipo_user" class="form-label">tipo de usuário</label>
               <input type="text" class="form-control" id="tipo_user" size="11" name = "tipo_user" required value="<?php echo $linha['tipo_user'];?>">
             </div> -->
              
            <div class="form-group">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>

             <?php 
                   if(isset($_GET['sexo']))
                   {
                       $sexo = strip_tags($_GET['sexo']);
                   } 
                   else
                   {
                       $sexo = false;
                   }
            ?>

            <div> <br> </div>  

             <form>
               <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Salvar Alterações">
                <input type="hidden" name="id" value= "<?php echo $linha['id'] ?>">

               <a href = "paciente_tabela.php" class = "btn btn-danger"> Voltar</a>
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
  
  </body>
</html>

<!--

Carregar dados de uma tabela em uma caixa de select

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