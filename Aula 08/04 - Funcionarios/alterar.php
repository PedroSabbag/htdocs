<?php 
	require("conecta.php");
	$nome="";
	$cargo="";
	$salario="";
	// GET - leitura - parametro idcli passado pela url
	if (isset($_GET["alterar"])) {
		$idfunc = htmlentities($_GET["alterar"]);
		$query = $mysqli->query("SELECT * FROM funcionarios WHERE idfunc = '$idfunc'");
		$tabela = $query->fetch_assoc();
		$nome = $tabela["nome"];
		$cargo = $tabela["cargo"];
		$salario = $tabela["salario"];
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idfunc" value="<?php echo $idfunc ?>">
		Nome do Funcionario: <input type="text" name="nome" value="<?php echo $nome ?>">
		<br/><br/>			
		Cargo: <input type="text" name="cargo" value="<?php echo $cargo ?>">
		<br/><br/>
		Salario: <input type="text" name="salario" value="<?php echo $salario ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idfunc   = htmlentities($_POST["idfunc"]);
		$nome  = htmlentities($_POST["nome"]);
		$cargo = htmlentities($_POST["cargo"]);
		$salario = htmlentities($_POST["salario"]);

		$mysqli->query("update funcionarios set nome = '$nome', cargo='$cargo',
		salario ='$salario' where idfunc = '$idfunc'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>