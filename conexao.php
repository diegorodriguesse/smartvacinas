<?php 
	$server  = "localhost";
	$user = "root";
	$pass = "";
	$bd = "smartvacinas";


	if($connection = mysqli_connect($server, $user, $pass, $bd)) { //echo("Conectado com sucesso!");
	}

	else {
		echo ("Deu erro ao conectar!");
	} 
	
	function mensagem ($texto, $tipo){
		echo "<div class='alert alert-$tipo' role='alert'>
  			$texto
		</div>";
	}


 ?>	
