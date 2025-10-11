<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
	Nome do Equipamento:
    <input type="text" name="equipamento" maxlength="60" placeholder="Digite o nome do equipamento" required>
    <br/><br/>

    Localização:
    <input type="text" name="localizacao" maxlength="50" placeholder="Digite a localização do equipamento" required>
    <br/><br/>

    Custo:
    <input type="text" name="custo" maxlength="9" placeholder="Digite o custo do equipamento" required>
    <br/><br/>

    Marca/Modelo:
    <input type="text" name="marcamodelo" maxlength="20" placeholder="Digite a marca ou modelo do equipamento" required>
    <br/><br/>

    <input type="submit" value="Salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$equipamento=htmlentities($_POST["equipamento"]);	
	$localizacao=htmlentities($_POST["localizacao"]);
	$custo=htmlentities($_POST["custo"]);	
	$marcamodelo=htmlentities($_POST["marcamodelo"]);


	// gravando dados
	$mysqli->query("insert into equipamentos values('', '$equipamento', '$localizacao','$custo','$marcamodelo')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>