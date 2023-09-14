<?php
	include "conexao.php"; 

	echo "Nome Paciente: " . $nome_paciente_selecionado . "<br>";
	echo "Nome Campanha: " . $nome_campanha_selecionada . "<br>";
	echo "Nome Vacina: " . $nome_vacina_selecionada . "<br>";
	echo "Data/Hora Aplicação: " . $data_hora_aplicacao . "<br>";

	if ($nome_paciente_selecionado != '' && $nome_campanha_selecionada != '' && $nome_vacina_selecionada!= '' && $data_hora_aplicacao != '' ){
		$nome_paciente = $_POST['nome_paciente_selecionado'] ;
		$nome_campanha = $_POST['nome_campanha_selecionada'] ;
		$nome_vacina = $_POST['nome_vacina_selecionada'] ;
		$data_hora_aplicacao = $_POST['data_hora_aplicacao'] ;
	
		$inserir_sql = "INSERT INTO aplicacao_vacina (nome_paciente, nome_campanha, nome_vacina, data_hora_aplicacao)
						VALUES ('$nome_paciente', '$nome_campanha', '$nome_vacina', '$data_hora_aplicacao')";
	
		if (mysqli_query($connection, $inserir_sql)) {
			echo "Dados inseridos com sucesso!";
		} else {
			echo "Erro ao inserir dados: " . mysqli_error($connection);
		}
		mysqli_close($connection);
	}
?>


