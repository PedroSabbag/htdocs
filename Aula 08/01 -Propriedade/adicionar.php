<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Nome da Propriedade: <input type="text" name="propriedade" maxlength="60" placeholder="Digite o Nome da Propriedade">
		<br/><br/>
		Nome do Proprietario: <input type="text" name="proprietario" maxlength="60" placeholder="Digite o Nome do Proprietario">	
		<br/><br/>	
		Area da Propriedade: <input type="text" name="area" maxlength="60" placeholder="Digite a Area da Propriedade">	
		<br/><br/>	
		Cultura: <input type="text" name="cultura" maxlength="60" placeholder="Digite o que voce Planta">	
		<br/><br/>	
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$propriedade=htmlentities($_POST["propriedade"]);	
	$proprietario=htmlentities($_POST["proprietario"]);
	$area=htmlentities($_POST["area"]);	
	$cultura=htmlentities($_POST["cultura"]);


	// gravando dados
	$mysqli->query("insert into propriedade values('', '$propriedade', '$proprietario','$area','$cultura')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>