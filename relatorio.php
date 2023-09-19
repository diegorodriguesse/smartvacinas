<?php

require_once 'conexao.php';

$sql = "SELECT aplicação_vacina.*, campanhas.nome_campanha, paciente.nome_social, vacina.nome_vacina, aplicação_vacina.data_hora_aplicacao
FROM aplicação_vacina 
INNER JOIN campanhas ON aplicação_vacina.id_campanha = campanhas.id_campanha
INNER JOIN paciente on paciente.id = aplicação_vacina.id_paciente
INNER JOIN vacina on vacina.id_vacina = aplicação_vacina.id_vacina
order by id_aplicacao asc
";


$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Aplicação</th><th>Paciente</th><th>Campanha</th> <th>Vacina</th> <th>Aplicado Em:</th></tr>";

    while($row = $result->fetch_assoc()) {
        $data_hora_formatada = date("d/m/Y H:i:s", strtotime($row["data_hora_aplicacao"]));
        echo "<tr><td>" . $row["id_aplicacao"] . "</td> <td>" . $row["nome_social"] . "</td>  <td>" . $row["nome_campanha"] . "</td> <td>" . $row["nome_vacina"] . "</td> <td>" . $data_hora_formatada  . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum dado encontrado na tabela.";
}

// Fecha a conexão com o banco de dados
$connection->close();
?>

</body>
</html>
