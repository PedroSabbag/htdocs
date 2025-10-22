<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Qual é Nome do Cliente: <input type="text" name="nome" maxlength="60" placeholder="Digite o Nome do Cliete">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$propriedade=htmlentities($_POST["clientes"]);

			// pesquisando dados
		$query = $mysqli->query("select * from clientes where nome like '%$nome%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>nome</th>
		<th>cpf_cnpj</th>
		<th>telfeone</th>
		<th>email</th>
		<th>cidade</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idcli]</td>
			<td align='center'>$tabela[nome]</td>
			<td align='center'>$tabela[cpf_cnpj]</td>
			<td align='center'>$tabela[telefone]</td>
			<td align='center'>$tabela[email]</td>
			<td align='center'>$tabela[cidade]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>