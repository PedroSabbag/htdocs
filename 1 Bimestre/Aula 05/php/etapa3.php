<?php
session_start();
$erro_pagto = "";
$erro_fpagto2 = "";
$erro_frete = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {

	// Forma de pagamento 1
	if (isset($_POST["fpagto"])) {
		$_SESSION["fpagto"] = $_POST["fpagto"];
	} else {
		$erro_validacao ++;
		$erro_pagto = '<span style="color:blue">Selecione uma das opções de pagamento</span>';
	}

	// Forma de pagamento 2
	//Professor eu tentei olhar e não achei nada no exemplo dai pesquisei e vi que tinha como mudar o Isset pelo !empty que dava certo.
	//Então pesquisei o erro para saber sobre essa informação.
	if (!empty($_POST["fpagto2"])) {
		$_SESSION["fpagto2"] = $_POST["fpagto2"];
	} else {
		$erro_validacao ++;
		$erro_fpagto2 = '<span style="color:blue">Escolha uma opção no select</span>';
	}

	// Frete 
	if (isset($_POST["frete"])) {
		$_SESSION["frete"] = $_POST["frete"];
	} else {
		$erro_validacao ++;
		$erro_frete = '<span style="color:blue">Selecione uma opção de frete</span>';
	}

	if ($erro_validacao == 0) {
		header("Location:confirma.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula05.css">
    <title>🎮🕹️ Planeta dos Jogos 🕹️🎮</title>
</head>
<body>
	<div class="container">
	<h2> 🎮🕹️ Planeta dos Jogos 🕹️🎮 </h2>
	<form method="POST" action="etapa3.php">

		<h2>Escolha a Forma de Pagamento</h2>
		<input type="radio" name="fpagto" value="1" <?php if ((isset($_SESSION["fpagto"])) AND ($_SESSION["fpagto"] == "1")) echo 'checked' ?> >À vista - desconto 9% (PIX) <br/>
		<input type="radio" name="fpagto" value="2" <?php if ((isset($_SESSION["fpagto"])) AND ($_SESSION["fpagto"] == "2")) echo 'checked' ?> >À prazo - acréscimo 11% (Boleto Bancário)<br/>
		<input type="radio" name="fpagto" value="3" <?php if ((isset($_SESSION["fpagto"])) AND ($_SESSION["fpagto"] == "3")) echo 'checked' ?> >Parcelado em 3x - acréscimo de 15% (Cartão Crédito)<br/>
		<?php echo $erro_pagto ?>

		<br/><br/>

		<h2>Outras Formas de Pagamentos</h2>
		<select name="fpagto2">
			<!-- Não sabia se era para deixar todas as formas de pagamento juntas OU Adicionar novas formas deixando as que vc ja tinha passado. Optei por adicionar elas-->
			<option value=""> Nenhuma Escolha</option>
			<option value="1" <?php if((isset($_SESSION["fpagto2"])) AND ($_SESSION["fpagto2"] == "1")) echo 'selected' ?>>Pix</option>
			<option value="2" <?php if((isset($_SESSION["fpagto2"])) AND ($_SESSION["fpagto2"] == "2")) echo 'selected' ?>>Boleto Bancário</option>
			<option value="3" <?php if((isset($_SESSION["fpagto2"])) AND ($_SESSION["fpagto2"] == "3")) echo 'selected' ?>>Cartão de Crédito</option>
		</select>
		<?php echo $erro_fpagto2 ?>

		<br/><br/>

		<h2>Escolha o Frete</h2>
		<input type="radio" name="frete" value="1" <?php if ((isset($_SESSION["frete"])) AND ($_SESSION["frete"] == "1")) echo 'checked' ?> >PAC - R$ 20,00 <br/>
		<input type="radio" name="frete" value="2" <?php if ((isset($_SESSION["frete"])) AND ($_SESSION["frete"] == "2")) echo 'checked' ?> >Sedex - R$ 50,00 <br/>
		<input type="radio" name="frete" value="3" <?php if ((isset($_SESSION["frete"])) AND ($_SESSION["frete"] == "3")) echo 'checked' ?> >Retirar na Loja - Grátis <br/>
		<?php echo $erro_frete ?>

		<br/><br/>

		<input type="submit" value="Prosseguir" name="botao"> <br/> <br/>
	</form>
	<a href="etapa2.php"><button>Voltar</button></a>
</div>
</body>
</html>