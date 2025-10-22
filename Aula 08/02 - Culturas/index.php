<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<h2>Cadastro de culturas</h2>
	<table border="1" width="600">
		<tr>
			<th>Id</th>
			<th>Cultura</th>
			<th>Variedade</th>
			<th>Ciclo</th>
			<th>Colheita</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from culturas");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idcultura]</td>
				<td align='center'>$tabela[cultura]</td>
				<td align='center'>$tabela[variedade]</td>
				<td align='center'>$tabela[ciclo]</td>
				<td align='center'>$tabela[colheita]</td>
				<td width='120'><a href='excluir.php?excluir=$tabela[idcultura]'>[excluir]</a>
				<a href='alterar.php?alterar=$tabela[idcultura]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
	<div class="botoes-centrais">
        <a href="adicionar.php"><button>Adicionar</button></a>
        <a href="pesquisar.php"><button>Pesquisar</button></a>
    </div>
</body>
</html>