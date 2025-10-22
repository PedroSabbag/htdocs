<?php 
	require("conecta.php");
	$data_venda="";
	$idcli="";
	$produto="";
	$quantidade="";
	$valortotal="";
	// GET - leitura - parametro idvenda passado pela url
	if (isset($_GET["alterar"])) {
		$idvenda = htmlentities($_GET["alterar"]);
		$query = $mysqli->query("SELECT * FROM vendas WHERE idvenda = '$idvenda'");
		$tabela = $query->fetch_assoc();
		$data_venda = $tabela["data_venda"];
		$idcli = $tabela["idcli"];
		$produto = $tabela["produto"];
		$quantidade = $tabela["quantidade"];
		$valortotal = $tabela["valortotal"];
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
		<input type="hidden" name="idvenda" value="<?php echo $idvenda ?>">
		Data da Venda: <input type="text" name="data_venda" value="<?php echo $data_venda ?>">
		<br/><br/>			
		Id do Cliente: <input type="text" name="idcli" value="<?php echo $idcli ?>">
		<br/><br/>
		Produto: <input type="text" name="produto" value="<?php echo $produto ?>">
		<br/><br/>
		Quantidade: <input type="text" name="quantidade" value="<?php echo $quantidade ?>">
		<br/><br/>
		Valor Total: <input type="text" name="valortotal" value="<?php echo $valortotal ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idvenda   = htmlentities($_POST["idvenda"]);
		$data_venda  = htmlentities($_POST["data_venda"]);
		$idcli = htmlentities($_POST["idcli"]);
		$produto = htmlentities($_POST["produto"]);
		$quantidade = htmlentities($_POST["quantidade"]);
		$valortotal = htmlentities($_POST["valortotal"]);

		$mysqli->query("update vendas set data_venda = '$data_venda', idcli='$idcli',
		produto ='$produto',quantidade ='$quantidade',valortotal ='$valortotal
		' where idvenda = '$idvenda'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>