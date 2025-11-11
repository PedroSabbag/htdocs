<?php 
	require("../conecta.php");
	$nomeprod="";
	$preco=""; 
    $quantidade="";
	
	if(isset($_GET["alterar"])){
		$idprod = htmlentities($_GET["alterar"]);
        // Tabela 'produtos'
		$query=$mysqli->query("select * from produtos where idprod = '$idprod'"); 
		$tabela=$query->fetch_assoc();
		$nomeprod=$tabela["nomeprod"];		
		$preco=$tabela["preco"];
        $quantidade=$tabela["quantidade"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="altprod.php"> 
		<input type="hidden" name="idprod" value="<?php echo $idprod ?>">
		Nome do Produto: <input type="text" name="nomeprod" value="<?php echo $nomeprod ?>">
		<br/><br/>
        Preço: <input type="text" name="preco" value="<?php echo $preco ?>">
        <br/><br/>	
		Estoque: <input type="number" name="quantidade" value="<?php echo $quantidade ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="produtos.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idprod = htmlentities($_POST["idprod"]);
		$nomeprod  = htmlentities($_POST["nomeprod"]);
		$preco = htmlentities($_POST["preco"]);
        $quantidade = htmlentities($_POST["quantidade"]);

		$mysqli->query("update produtos set nomeprod = '$nomeprod', preco='$preco', quantidade='$quantidade' where idprod = '$idprod' "); 
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>