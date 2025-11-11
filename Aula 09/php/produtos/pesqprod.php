<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesqprod.php"> 
		Nome do Produto: <input type="text" name="nomeprod" maxlength="40" placeholder="Digite o Nome do Produto">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("../conecta.php");
		$nomeprod=htmlentities($_POST["nomeprod"]);

			// pesquisando dados
		$query = $mysqli->query("select * from produtos where nomeprod like '%$nomeprod%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='600'>
		<tr>
		<th>ID</th>
		<th>Nome do Produto</th>
		<th>Preço</th>
		<th>Estoque</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idprod]</td>
			<td align='center'>$tabela[nomeprod]</td>
			<td align='center'>R$ ".number_format($tabela['preco'], 2, ',', '.')."</td>
			<td align='center'>$tabela[quantidade]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='produtos.php'> Voltar</a>
</body>
</html>