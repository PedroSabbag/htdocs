<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Qual é Nome do Funcionario: <input type="text" name="nome" maxlength="60" placeholder="Digite o Nome do Funcionario">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$propriedade=htmlentities($_POST["funcionarios"]);

			// pesquisando dados
		$query = $mysqli->query("select * from funcionarios where nome like '%$nome%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>nome</th>
		<th>cargo</th>
		<th>salario</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idfunc]</td>
			<td align='center'>$tabela[nome]</td>
			<td align='center'>$tabela[cargo]</td>
			<td align='center'>$tabela[salario]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>