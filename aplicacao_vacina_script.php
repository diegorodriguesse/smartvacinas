<?php
	include "conexao.php"; 

  	$id_paciente_selecionado = $_POST['id_paciente_selecionado'];
    $id_campanha_selecionada = $_POST['id_campanha_selecionada'];
    $id_vacina_selecionada = $_POST['id_vacina_selecionada'];

	echo "Nome Paciente: " . $id_paciente_selecionado . "<br>";
	echo "Nome Campanha: " . $id_campanha_selecionada . "<br>";
	echo "Nome Vacina: " . $id_vacina_selecionada . "<br>";

   $sql = "INSERT INTO aplicação_vacina (id_campanha, id_vacina, data_hora_aplicacao, id_paciente) VALUES ('$id_campanha_selecionada', '$id_vacina_selecionada', NOW(), '$id_paciente_selecionado');";
    
		if (mysqli_query($connection, $sql)) {
			echo "Dados inseridos com sucesso!";
		} else {
			echo "Erro ao inserir dados: " . mysqli_error($connection);
		}
		mysqli_close($connection);
	
?>
<a href = "aplicacao_vacina.php" class = "btn btn-primary"> Voltar </a>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
      </div>
    </div>
</html>

