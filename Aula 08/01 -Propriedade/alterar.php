<?php 
	require("conecta.php");
	$propriedade="";
	$proprietario="";
	$area="";
	$cultura=""; 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterar"])){
		$idprop = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from propriedade where idprop = '$idprop'");
		$tabela=$query->fetch_assoc();
		$propriedade=$tabela["propriedade"];		
		$proprietario=$tabela["proprietario"];
		$area=$tabela["area"];		
		$cultura=$tabela["cultura"];
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
		<input type="hidden" name="idprop" value="<?php echo $idprop ?>">
		Propriedade: <input type="text" name="propriedade" value="<?php echo $propriedade ?>">
		<br/><br/>			
		Proprietario: <input type="text" name="proprietario" value="<?php echo $proprietario ?>">
		<br/><br/>
		Area: <input type="text" name="area" value="<?php echo $area ?>">
		<br/><br/>
		Cultura: <input type="text" name="cultura" value="<?php echo $cultura ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idprop   = htmlentities($_POST["idprop"]);
		$propriedade  = htmlentities($_POST["propriedade"]);
		$proprietario = htmlentities($_POST["proprietario"]);
		$area = htmlentities($_POST["area"]);
		$cultura = htmlentities($_POST["cultura"]);

		$mysqli->query("update propriedade set propriedade = '$propriedade', proprietario='$proprietario',
		area ='$area', cultura = '$cultura' where idcli = '$idcli'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>