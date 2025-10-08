<?php
session_start();
$erro_jogo1 = "";
$erro_jogo2 = "";
$erro_produto = "";
$erro_quantidade1 = "";
$erro_quantidade2 = "";
$erro_quantidade3 = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
	$_SESSION["jogo1"]  = $_POST["jogo1"];
	$_SESSION["qtdade1"] = $_POST["qtdade1"];
	$_SESSION["qtdade2"] = $_POST["qtdade2"];
	$_SESSION["qtdade3"] = $_POST["qtdade3"];
	
	if (isset($_POST["jogo2"])) {
		$_SESSION["jogo2"] = $_POST["jogo2"];
	} else {
		$erro_validacao++;
		$erro_jogo2 = '<span style="color:red">Selecione um jogo de PS5</span>';
	}

	if (isset($_POST["produto"])) {
		$_SESSION["produto"] = $_POST["produto"];
	} else {
		$erro_validacao++;
		$erro_produto = '<span style="color:red">Escolha pelo menos 1 produto</span>';
	}

	// Qtd Jogo 1
	if ($_SESSION["qtdade1"] < 1) {
		$erro_quantidade1 = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	} elseif ($_SESSION["qtdade1"] > 4) {
		$erro_quantidade1 = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

	// Qtd Produto 2
	if (isset($_SESSION["qtdade2"])) {
		if ($_SESSION["qtdade2"] < 1) {
			$erro_quantidade2 = "<span style='color:red'>Preencher Quantidade</span>";
			$erro_validacao ++;
		} elseif ($_SESSION["qtdade2"] > 4) {
			$erro_quantidade2 = "<span style='color:red'>Limite de Venda excedido</span>";
			$erro_validacao ++;
		}
	}

	// Qtd Produto 3
	if (isset($_SESSION["qtdade3"])) {
		if ($_SESSION["qtdade3"] < 1) {
			$erro_quantidade3 = "<span style='color:red'>Preencher Quantidade</span>";
			$erro_validacao ++;
		} elseif ($_SESSION["qtdade3"] > 2) {
			$erro_quantidade3 = "<span style='color:red'>Limite de Venda excedido</span>";
			$erro_validacao ++;
		}
	}

	if ($erro_validacao == 0) {
		Header("location:etapa3.php");
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
	<form method="POST" action="etapa2.php">
		<h2>Escolha seu Jogo Nintendo:</h2>
		<select name="jogo1">
		<option value=""> Nenhum Jogo</option>
			<option value="1" <?php if((isset($_SESSION["jogo1"])) AND ($_SESSION["jogo1"] == "1")) echo 'selected' ?>> Pokémon - R$ 399,00 </option> 
			<option value="2" <?php if((isset($_SESSION["jogo1"])) AND ($_SESSION["jogo1"] == "2")) echo 'selected' ?>> Mario -  R$ 299,00 </option> 
			<option value="3" <?php if((isset($_SESSION["jogo1"])) AND ($_SESSION["jogo1"] == "3")) echo 'selected' ?>> Zelda - R$ 349,00 </option>
			<option value="4" <?php if((isset($_SESSION["jogo1"])) AND ($_SESSION["jogo1"] == "4")) echo 'selected' ?>> Sonic - R$ 249,00 </option>
			<?php echo $erro_jogo1 ?>
		</select><br/>
		Quantidade: 
		<input type="text" name="qtdade1" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade1"])) echo $_SESSION["qtdade1"] ?>" />
		<?php echo $erro_quantidade1 ?>

		<br/><br/>

		<h2>Jogos PS5:</h2>
		<input type="radio" name="jogo2" value="1" <?php if ((isset($_SESSION["jogo2"])) AND ($_SESSION["jogo2"] == "1")) echo 'checked' ?> >Nenhum Jogo <br/>
		<input type="radio" name="jogo2" value="2" <?php if ((isset($_SESSION["jogo2"])) AND ($_SESSION["jogo2"] == "2")) echo 'checked' ?> >The Last of Us - R$ 299,00 <br/>
		<input type="radio" name="jogo2" value="3" <?php if ((isset($_SESSION["jogo2"])) AND ($_SESSION["jogo2"] == "3")) echo 'checked' ?> >Elden Ring - R$ 349,00 <br/>
		<input type="radio" name="jogo2" value="4" <?php if ((isset($_SESSION["jogo2"])) AND ($_SESSION["jogo2"] == "4")) echo 'checked' ?> >God of War IV - R$ 249,00 <br/>
		<input type="radio" name="jogo2" value="5" <?php if ((isset($_SESSION["jogo2"])) AND ($_SESSION["jogo2"] == "5")) echo 'checked' ?> >Spider Man - R$ 299,00 <br/>
		<?php echo $erro_jogo2 ?> 

		<br/>
		Quantidade: 
		<input type="text" name="qtdade2" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade2"])) echo $_SESSION["qtdade2"] ?>" />
		<?php echo $erro_quantidade2 ?>
		
		<br/><br/>

		<!--Pesquisei aqui tbm pois dps que eu fiz deu erro de array no codigo tirei ate print caso queira ver dps. E vi que era necssario colocar o []. -->
		<h2>Consoles:</h2>
		<input type="checkbox" name="produto[]" value="1" <?php if ((isset($_SESSION["produto"])) AND in_array("1", $_SESSION["produto"])) echo 'checked' ?> >Nenhum Produto <br/>
		<input type="checkbox" name="produto[]" value="2" <?php if ((isset($_SESSION["produto"])) AND in_array("2", $_SESSION["produto"])) echo '' ?> >Ps5 - R$ 3600,00 <br/>
		<input type="checkbox" name="produto[]" value="3" <?php if ((isset($_SESSION["produto"])) AND in_array("3", $_SESSION["produto"])) echo '' ?> >Nintendo Switch - R$ 1700,00 <br/>
		<input type="checkbox" name="produto[]" value="4" <?php if ((isset($_SESSION["produto"])) AND in_array("4", $_SESSION["produto"])) echo '' ?> >Xbox - R$ 2500,00 <br/>
		<input type="checkbox" name="produto[]" value="5" <?php if ((isset($_SESSION["produto"])) AND in_array("5", $_SESSION["produto"])) echo '' ?> >Controle Extra - R$ 499,00 <br/>
		<?php echo $erro_produto ?> 

		<br/>
		Quantidade: 
		<input type="text" name="qtdade3" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade3"])) echo $_SESSION["qtdade3"] ?>" />
		<?php echo $erro_quantidade3 ?>

		<br/> <br/>

		<input type="submit" value="Prosseguir" name="botao"> <br/> <br/>
	</form>
	<a href="etapa1.php"><button>Voltar</button></a>
</div>
</body>
</html>