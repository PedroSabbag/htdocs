<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	// GET - leitura - parametro idvendedor passado pela url
	if(isset($_GET["excluir"])){

		$idvendedor = htmlentities($_GET["excluir"]); 
		require("../conecta.php");
		$mysqli->query("delete from vendedores where idvendedor = '$idvendedor'"); 
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='vendedores.php'>Voltar</a>"; 
		}
	}
	?>
</body>
</html>