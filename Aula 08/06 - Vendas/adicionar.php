<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="adicionar.php">
	Data da Venda:
    <input type="text" name="data_venda" maxlength="60" placeholder="Digite Data da Venda" required>
    <br/><br/>

    IdCli:
    <input type="text" name="idcli" maxlength="50" placeholder="Digite o Id do Cliente da Venda" required>
    <br/><br/>

    produto:
    <input type="text" name="produto" maxlength="9" placeholder="Digite o Produto do Venda" required>
    <br/><br/>

	Quantidade:
    <input type="text" name="quantidade" maxlength="9" placeholder="Digite o Quantidade da Venda" required>
    <br/><br/>

	Valor Total:
    <input type="text" name="valortotal" maxlength="9" placeholder="Digite o Valor Total da venda" required>
    <br/><br/>

    <input type="submit" value="Salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$data_venda=$_POST["data_venda"];
	$data_venda=htmlentities($_POST["data_venda"]);	
	$idcli=htmlentities($_POST["idcli"]);
	$produto=htmlentities($_POST["produto"]);	
	$quantidade=htmlentities($_POST["quantidade"]);	
	$valortotal=htmlentities($_POST["valortotal"]);	


	// gravando dados
	$mysqli->query("insert into vendas values('', '$data_venda', '$idcli','$produto','$quantidade','$valortotal')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>