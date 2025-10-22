<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="adicionar.php">
	Nome do Funcionario:
    <input type="text" name="nome" maxlength="60" placeholder="Digite o nome do Funcionario" required>
    <br/><br/>

    Cargo:
    <input type="text" name="cargo" maxlength="50" placeholder="Digite o Cargo do funcionario" required>
    <br/><br/>

    Salario:
    <input type="text" name="salario" maxlength="9" placeholder="Digite o Salario do funcionario" required>
    <br/><br/>

    <input type="submit" value="Salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$nome=htmlentities($_POST["nome"]);	
	$cargo=htmlentities($_POST["cargo"]);
	$salario=htmlentities($_POST["salario"]);	


	// gravando dados
	$mysqli->query("insert into funcionarios values('', '$nome', '$cargo','$salario')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>