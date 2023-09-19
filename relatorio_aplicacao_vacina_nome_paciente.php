<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Dados</title>
</head>
<body>


<h2>Filtre por Nome do Paciente</h2>
<form method="POST" action="">
    Nome do Paciente: <input type="text" name="nome_paciente"> 
             <input type="submit" value="Filtrar">
         </form>

<?php 
require_once 'conexao.php';

$nome_paciente = $_POST['nome_paciente'];

$sql = "SELECT aplicação_vacina.*, campanhas.nome_campanha 
FROM aplicação_vacina 
INNER JOIN campanhas ON aplicação_vacina.id_campanha = campanhas.id_campanha
WHERE id_paciente IN (SELECT id FROM paciente WHERE nome_social LIKE '%$nome_paciente%');";


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

  $connection->close();
  
?>

</body>
</html>




