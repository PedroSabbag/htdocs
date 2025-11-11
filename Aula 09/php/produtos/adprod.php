<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adprod.php">
		Nome do Produto: <input type="text" name="nomeprod" maxlength="100" placeholder="Digite o nome do produto">
		<br/><br/>
		Preço: <input type="text" name="preco" placeholder="99.99">
        <br/><br/>
        Estoque: <input type="number" name="quantidade" placeholder="0">
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("../conecta.php");

	$nomeprod=htmlentities($_POST["nomeprod"]);	
	$preco=htmlentities($_POST["preco"]);
    $quantidade=htmlentities($_POST["quantidade"]);

	
	$mysqli->query("insert into produtos (nomeprod, preco, quantidade) values('$nomeprod', '$preco', '$quantidade')"); 
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='produtos.php'> Voltar</a>"; 
	}

}
?>