<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
    <form method="POST" action="addvend.php"> 
		CPF: <input type="text" name="cpf" maxlength="20" placeholder="Digite o Cpf">
		<br/><br/>
		Nome do Vendedor: <input type="text" name="nome" maxlength="50" placeholder="Digite o Nome do Vendedor">		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("../conecta.php");

	$cpf=htmlentities($_POST["cpf"]);	
	$nome=htmlentities($_POST["nome"]);

    // CORRIGIDO: Tabela 'vendedores'
	$mysqli->query("insert into vendedores (cpf, nome) values('$cpf', '$nome')"); 
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";
		echo "<a href='vendedores.php'> Voltar</a>"; 
	}

}
?>