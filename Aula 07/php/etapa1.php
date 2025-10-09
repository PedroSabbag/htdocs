<?php
session_start();
$erro_nome = "";
$erro_email = "";
$erro_cpf = "";
$erro_id = "";
$erro_cep = "";
$erro_numero = "";
$erro_rua = "";
$erro_complemento = "";
$erro_cidade = "";
$erro_estado = "";
$erro_telefone = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
	$_SESSION["nome"]  = $_POST["nome"];
	$_SESSION["cpf"] = $_POST["cpf"];
    $_SESSION["id"] = $_POST["id"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["cep"] = $_POST["cep"];
	$_SESSION["numero"] = $_POST["numero"];
	$_SESSION["rua"] = $_POST["rua"];
	$_SESSION["complemento"] = $_POST["complemento"];
	$_SESSION["cidade"] = $_POST["cidade"];
	$_SESSION["estado"] = $_POST["estado"];
	$_SESSION["telefone"] = $_POST["telefone"];
	
	if ($_SESSION["nome"] == "") {
		$erro_nome = "<span style='color:red'>Preencha o nome</span>";
		$erro_validacao ++;
	} 

		
	if ($_SESSION["cpf"] == "") {
		$erro_cpf = "<span style='color:red'>Preencha o CPF</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["email"] == "") {
		$erro_email = "<span style='color:red'>Preencha com seu Email</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["id"] == "") {
		$erro_id = "<span style='color:red'>Coloque o seu ID</span>";
		$erro_validacao ++;
	}
		
	if ($_SESSION["cep"] == "") {
		$erro_cep = "<span style='color:red'>Coloque o seu Cep</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["numero"] == "") {
		$erro_numero = "<span style='color:red'>Informe o Numero da sua casa </span>";
		$erro_validacao ++;
	}

	if ($_SESSION["rua"] == "") {
		$erro_rua = "<span style='color:red'>Informe a sua Rua </span>";
		$erro_validacao ++;
	}

	if ($_SESSION["complemento"] == "") {
		$erro_complemento = "<span style='color:red'>Informe seu Complemento </span>";
		$erro_validacao ++;
	}

	if ($_SESSION["cidade"] == "") {
		$erro_cidade = "<span style='color:red'>Informe sua Cidade </span>";
		$erro_validacao ++;
	}

	if ($_SESSION["estado"] == "") {
		$erro_estado = "<span style='color:red'>Informe o seu Estado</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["telefone"] == "") {
		$erro_telefone = "<span style='color:red'>Informe o seu Telefone/Celular</span>";
		$erro_validacao ++;
	}

	if ($erro_validacao == 0) {
		Header("location:etapa2.php");
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula05.css">
    <title> 🎮🕹️ Planeta dos Jogos 🕹️🎮</title>
</head>
<body>
<div class="container">
	<h2>Cadastro Cliente</h2>
	<form method="POST" action="etapa1.php" class="signup-form">
		Nome:  <input type="text" name="nome" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["nome"])) echo $_SESSION["nome"] ?>">
		<?php echo $erro_nome ?> 
		<br/><br/>

		Email: <input type="text" name="email" placeholder="jorginho@gmail.com" size="60" maxlength="50" 
		value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"] ?>">
		<?php echo $erro_email ?>
		<br/><br/>


		Cpf:  <input type="text" name="cpf" placeholder="000.000.000-00" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["cpf"])) echo $_SESSION["cpf"] ?>">
		<?php echo $erro_cpf ?> 
		<br/><br/>
        
        Id Cliente: <input type="text" name="id" placeholder="00001" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["id"])) echo $_SESSION["id"] ?>">
		<?php echo $erro_id ?> 
		<br/><br/>

		Telefone:  <input type="text" name="telefone" placeholder="(00)90000-0000" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["telefone"])) echo $_SESSION["telefone"] ?>">
		<?php echo $erro_telefone ?> 
		<br/><br/>

		Cidade:  <input type="text" name="cidade" placeholder="Bauru" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["cidade"])) echo $_SESSION["cidade"] ?>">
		<?php echo $erro_cidade ?> 
		<br/><br/>

		Estado:  <input type="text" name="estado" placeholder="Sp" size="60" maxlength="50" minlength="2"
		value="<?php if (isset($_SESSION["estado"])) echo $_SESSION["estado"] ?>">
		<?php echo $erro_estado ?> 
		<br/><br/>

		Numero:  <input type="text" name="numero" placeholder="Numero Casa/Apt -- 310" size="60" maxlength="50" minlength="3 "
		value="<?php if (isset($_SESSION["numero"])) echo $_SESSION["numero"] ?>">
		<?php echo $erro_numero ?> 
		<br/><br/>

		Rua:  <input type="text" name="rua" placeholder="Rua Jorginho" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["rua"])) echo $_SESSION["rua"] ?>">
		<?php echo $erro_rua ?> 
		<br/><br/>

		Complemento:  <input type="text" name="complemento" placeholder="Casa na esquina" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["complemento"])) echo $_SESSION["complemento"] ?>">
		<?php echo $erro_complemento ?> 
		<br/><br/>

		Cep:  <input type="text" name="cep" placeholder="00000-00" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["cep"])) echo $_SESSION["cep"] ?>">
		<?php echo $erro_cep ?> 
		<br/><br/>

		<input type="submit" value="Prosseguir" name="botao">
	</form>
	<br/>
	<a href="../index.php"><button>Voltar</button></a>
</div>
</body>
</html>
