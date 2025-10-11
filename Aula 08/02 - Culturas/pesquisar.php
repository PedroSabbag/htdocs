<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Qual é a Cultura: <input type="text" name="cultura" maxlength="60" placeholder="Digite o Nome da Cultura">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$propriedade=htmlentities($_POST["culturas"]);

			// pesquisando dados
		$query = $mysqli->query("select * from culturas where cultura like '%$cultura%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>Cultura</th>
		<th>Variedade</th>
		<th>Ciclo</th>
		<th>Colheita</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idcultura]</td>
			<td align='center'>$tabela[cultura]</td>
			<td align='center'>$tabela[varieade]</td>
			<td align='center'>$tabela[ciclo]</td>
			<td align='center'>$tabela[colheita]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>