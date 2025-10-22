<?php 
	require("conecta.php");
	$nome="";
	$cpf_cnpj="";
	$telefone="";
	$email="";
	$cidade="";
	// GET - leitura - parametro idcli passado pela url
	if (isset($_GET["alterar"])) {
		$idcli = htmlentities($_GET["alterar"]);
		$query = $mysqli->query("SELECT * FROM clientes WHERE idcli = '$idcli'");
		$tabela = $query->fetch_assoc();
		$nome = $tabela["nome"];
		$cpf_cnpj = $tabela["cpf_cnpj"];
		$telefone = $tabela["telefone"];
		$email = $tabela["email"];
		$cidade = $tabela["cidade"];
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
		<input type="hidden" name="idcli" value="<?php echo $idcli ?>">
		Nome do clientes: <input type="text" name="nome" value="<?php echo $nome ?>">
		<br/><br/>			
		Cpf/Cnpj: <input type="text" name="cpf_cnpj" value="<?php echo $cpf_cnpj ?>">
		<br/><br/>
		Telefone: <input type="text" name="telefone" value="<?php echo $telefone ?>">
		<br/><br/>
		Email: <input type="text" name="email" value="<?php echo $email ?>">
		<br/><br/>
		Cidade: <input type="text" name="cidade" value="<?php echo $cidade ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idcli   = htmlentities($_POST["idcli"]);
		$nome  = htmlentities($_POST["nome"]);
		$cpf_cnpj = htmlentities($_POST["cpf_cnpj"]);
		$telefone = htmlentities($_POST["telefone"]);
		$email = htmlentities($_POST["email"]);
		$cidade = htmlentities($_POST["cidade"]);

		$mysqli->query("update clientes set nome = '$nome', cpf_cnpj='$cpf_cnpj',
		telefone ='$telefone',email ='$email',cidade ='$cidade
		' where idcli = '$idcli'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>