<?php  
	$domain="localhost";// localização
	$user="root";		// usuário
	$password="";		// senha
	$database="loja";	// banco de dados	

	$mysqli = new mysqli($domain,$user,$password,$database);
	$mysqli->set_charset("utf8");  
	
	if($mysqli->connect_errno){
		echo "Não foi possível conectar com o banco de dados ";
		echo $mysqli->connect_error; 
	}
?>