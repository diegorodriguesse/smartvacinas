<?php
include "conexao.php";

$campanhaSelecionada = $_POST['campanhaSelecionada'];

//essa consulta funciona
//$vacina_sql = "SELECT * FROM juncao_campanha_vacina WHERE id_campanha = '$campanhaSelecionada'";
$vacina_sql = "SELECT vacina.nome_vacina, juncao_campanha_vacina.id_vacina FROM juncao_campanha_vacina 
JOIN vacina on juncao_campanha_vacina.id_vacina = vacina.id_vacina
WHERE juncao_campanha_vacina.id_campanha = '$campanhaSelecionada'";

//$vacina_sql = "SELECT distinct v.nome_vacina FROM vacina v join juncao_campanha_vacina jcv on v.id_vacina = jcv.id_vacina join campanhas c on c.id_campanha = jcv.id_campanha where c.id_campanha = '$campanhaSelecionada'";
$dados_vacinas = mysqli_query($connection, $vacina_sql);

$options = '';
while ($row2 = mysqli_fetch_array($dados_vacinas)) {
    $options .= "<option value='{$row2[1]}'>{$row2[0]}</option>";
}

echo $options;
?>