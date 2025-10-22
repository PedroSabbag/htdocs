<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="adicionar.php">
	Nome da Cultura: 
    <input type="text" name="cultura" maxlength="60" placeholder="Digite o nome da cultura" required>
    <br/><br/>

    Variedade: 
    <input type="text" name="variedade" maxlength="60" placeholder="Digite a variedade da cultura" required>
    <br/><br/>

    Ciclo: 
    <input type="text" name="ciclo" maxlength="20" placeholder="Digite o ciclo da cultura" required>
    <br/><br/>

    Colheita: 
    <input type="text" name="colheita" maxlength="20" placeholder="Digite o período de colheita" required>
    <br/><br/>

    <input type="submit" value="Salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$cultura=htmlentities($_POST["cultura"]);	
	$variedade=htmlentities($_POST["variedade"]);
	$ciclo=htmlentities($_POST["ciclo"]);	
	$colheita=htmlentities($_POST["colheita"]);


	// gravando dados
	$mysqli->query("insert into culturas values('', '$cultura', '$variedade','$ciclo','$colheita')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>