<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Qual é o Produto: <input type="text" name="data_venda" maxlength="60" placeholder="Digite o qual é o Produto">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$propriedade=htmlentities($_POST["vendas"]);

			// pesquisando dados
		$query = $mysqli->query("select * from vendas where data_venda like '%$data_venda%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>DataVenda</th>
		<th>Idcli</th>
		<th>Telefone</th>
		<th>Quantidade</th>
		<th>ValorTotal</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idvenda]</td>
			<td align='center'>$tabela[data_venda]</td>
			<td align='center'>$tabela[idcli]</td>
			<td align='center'>$tabela[produto]</td>
			<td align='center'>$tabela[quantidade]</td>
			<td align='center'>$tabela[valortotal]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>