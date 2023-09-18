<?php
include "conexao.php";

$campanhaSelecionada = $_POST['campanhaSelecionada'];

$vacina_sql = "SELECT * FROM juncao_campanha_vacina WHERE id_campanha = '$campanhaSelecionada'";
$dados_vacinas = mysqli_query($connection, $vacina_sql);

$options = '';
while ($row2 = mysqli_fetch_array($dados_vacinas)) {
    $options .= "<option value='{$row2[2]}'>{$row2[2]}</option>";
}

echo $options;
?>