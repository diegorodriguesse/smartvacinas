<?php
include "conexao.php";

$campanhaSelecionada = $_POST['campanhaSelecionada'];

$vacina_sql = "SELECT * FROM vacina WHERE nome_campanha = '$campanhaSelecionada'";
$dados_vacinas = mysqli_query($connection, $vacina_sql);

$options = '';
while ($row2 = mysqli_fetch_array($dados_vacinas)) {
    $options .= "<option value='{$row2[2]}'>{$row2[2]}</option>";
}

echo $options;
?>