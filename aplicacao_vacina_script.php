<?php
	include "conexao.php"; 

	$id_paciente_selecionado = $_POST['id_paciente_selecionado'];
    $id_campanha_selecionada = $_POST['id_campanha_selecionada'];
    $id_vacina_selecionada = $_POST['id_vacina_selecionada'];
    $data_hora_aplicacao = $_POST['data_hora_aplicacao'];

	echo "Nome Paciente: " . $id_paciente_selecionado . "<br>";
	echo "Nome Campanha: " . $id_campanha_selecionada . "<br>";
	echo "Nome Vacina: " . $id_vacina_selecionada . "<br>";

    /* $sql = "INSERT INTO aplicação_vacina (id_aplicacao, id_campanha, id_vacina, data_hora_aplicacao) VALUES ('$id_paciente_selecionado', '$id_campanha_selecionada', '$id_vacina_selecionada', NOW()";
    // $sql = "INSERT INTO aplicação_vacina (id_campanha, id_vacina, data_hora_aplicacao, id_paciente) VALUES (4, 4, NOW(),23)";

		if (mysqli_query($connection, $sql)) {
			echo "Dados inseridos com sucesso!";
		} else {
			echo "Erro ao inserir dados: " . mysqli_error($connection);
		}
		mysqli_close($connection);
	*/
?>


