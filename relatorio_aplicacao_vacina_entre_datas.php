<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Dados</title>
</head>
<body>

<h2>Filtre por Faixa de Datas</h2>
<form method="POST" action="">
    Data Inicial: <input type="date" name="data_inicial">
    Data Final: <input type="date" name="data_final">
    <input type="submit" value="Filtrar">
</form>

<?php
 
 require_once 'conexao.php';


// Inicializa as variáveis de filtro
//$data_inicial = $data_final = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_inicial = $_POST["data_inicial"];
    $data_final = $_POST["data_final"];
    
    // Consulta SQL com JOIN e filtro de datas
    $sql = "SELECT aplicação_vacina.*, campanhas.nome_campanha 
    FROM aplicação_vacina 
    INNER JOIN campanhas ON aplicação_vacina.id_campanha = campanhas.id_campanha
    WHERE  data_hora_aplicacao BETWEEN '$data_inicial 00:00:00' AND '$data_final 23:59:59'";
    
    // Executa a consulta
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>id_aplicacao</th><th>id_campanha</th><th>id_vacina</th><th>Data/Hora Aplicação</th><th>id_paciente</th><th>Nome Campanha</th></tr>";
    
        while($row = $result->fetch_assoc()) {
            $data_hora_formatada = date("d/m/Y H:i:s", strtotime($row["data_hora_aplicacao"]));
            echo "<tr><td>" . $row["id_aplicacao"] . "</td><td>" . $row["id_campanha"] . "</td><td>" . $row["id_vacina"] . "</td><td>" . $data_hora_formatada . "</td><td>" . $row["id_paciente"] . "</td><td>" . $row["nome_campanha"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum dado encontrado na tabela.";
    }
}

// Fecha a conexão com o banco de dados
$connection->close();
?>

</body>
</html>
