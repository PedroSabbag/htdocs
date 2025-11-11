<?php 
	require("../conecta.php");
	$cpf="";
	$nome=""; 
	// GET - leitura - parametro idvendedor passado pela url
	if(isset($_GET["alterar"])){
		$idvendedor = htmlentities($_GET["alterar"]);

		$query=$mysqli->query("select * from vendedores where idvendedor = '$idvendedor'"); 
		$tabela=$query->fetch_assoc();
		$cpf=$tabela["cpf"];		
		$nome=$tabela["nome"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
    <form method="POST" action="altvend.php"> 
		<input type="hidden" name="idvendedor" value="<?php echo $idvendedor ?>">
		Cpf: <input type="text" name="cpf" value="<?php echo $cpf ?>">
		<br/><br/>			
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="vendedores.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idvendedor   = htmlentities($_POST["idvendedor"]);
		$cpf  = htmlentities($_POST["cpf"]);
		$nome = htmlentities($_POST["nome"]);

		$mysqli->query("update vendedores set cpf = '$cpf', nome='$nome' where idvendedor = '$idvendedor'  "); 
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>