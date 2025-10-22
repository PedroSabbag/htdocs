<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="adicionar.php">
	Nome do clientes:
    <input type="text" name="nome" maxlength="60" placeholder="Digite o nome do Cliente" required>
    <br/><br/>

    Cpf/Cnpj:
    <input type="text" name="cpf_cnpj" maxlength="50" placeholder="Digite o cpf_cnpj do Cliente" required>
    <br/><br/>

    Telefone:
    <input type="text" name="telefone" maxlength="9" placeholder="Digite o Telefone do Cliente" required>
    <br/><br/>

	Email:
    <input type="text" name="email" maxlength="9" placeholder="Digite o Email do Cliente" required>
    <br/><br/>

	Cidade:
    <input type="text" name="cidade" maxlength="9" placeholder="Digite o Cidade do Cliente" required>
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
	$cpf_cnpj=htmlentities($_POST["cpf_cnpj"]);
	$telefone=htmlentities($_POST["telefone"]);	
	$email=htmlentities($_POST["email"]);	
	$cidade=htmlentities($_POST["cidade"]);	


	// gravando dados
	$mysqli->query("insert into clientes values('', '$nome', '$cpf_cnpj','$telefone','$email','$cidade')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>