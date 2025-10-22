<?php 
	require("conecta.php");
	$equipamento="";
	$localizacao="";
	$custo="";
	$marcamodelo=""; 
	// GET - leitura - parametro idcli passado pela url
	if (isset($_GET["alterar"])) {
		$idequipe = htmlentities($_GET["alterar"]);
		$query = $mysqli->query("SELECT * FROM equipamentos WHERE idequipe = '$idequipe'");
		$tabela = $query->fetch_assoc();
		$equipamento = $tabela["equipamento"];
		$localizacao = $tabela["localizacao"];
		$custo = $tabela["custo"];
		$marcamodelo = $tabela["marcamodelo"];
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
		<input type="hidden" name="idequipe" value="<?php echo $idequipe ?>">
		Equipamento: <input type="text" name="equipamento" value="<?php echo $equipamento ?>">
		<br/><br/>			
		Localização: <input type="text" name="localizacao" value="<?php echo $localizacao ?>">
		<br/><br/>
		Custo: <input type="text" name="custo" value="<?php echo $custo ?>">
		<br/><br/>
		Marca/Modelo: <input type="text" name="marcamodelo" value="<?php echo $marcamodelo ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idequipe   = htmlentities($_POST["idequipe"]);
		$equipamento  = htmlentities($_POST["equipamento"]);
		$localizacao = htmlentities($_POST["localizacao"]);
		$custo = htmlentities($_POST["custo"]);
		$marcamodelo = htmlentities($_POST["marcamodelo"]);

		$mysqli->query("update equipamentos set equipamento = '$equipamento', localizacao='$localizacao',
		custo ='$custo', marcamodelo = '$marcamodelo' where idequipe = '$idequipe'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>