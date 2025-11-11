<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
    <form method="POST" action="pesqvend.php"> 
		Nome do Vendedor: <input type="text" name="nome" maxlength="40" placeholder="Digite o Nome do Vendedor">
		<input type="submit" value="pesquisar" name="botao">
	</form>

    <?php 
	if(isset($_POST["botao"])){

		require("../conecta.php");
		$nome=htmlentities($_POST["nome"]);

			// pesquisando dados
		$query = $mysqli->query("select * from vendedores where nome like '%$nome%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>CPF</th>
		<th>Nome do Vendedor</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idvendedor]</td>
			<td align='center'>$tabela[cpf]</td>
			<td align='center'>$tabela[nome]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='vendedores.php'> Voltar</a>
</body>
</html>