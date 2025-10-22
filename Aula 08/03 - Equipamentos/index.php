<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">
</head>
<body>
	<h2>Cadastro de Equipamentos</h2>
	<table border="1" width="600">
		<tr>
			<th>Id</th>
			<th>Equipamento</th>
			<th>Localização</th>
			<th>Custo</th>
			<th>Marca/Modelo</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from equipamentos");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idequipe]</td>
				<td align='center'>$tabela[equipamento]</td>
				<td align='center'>$tabela[localizacao]</td>
				<td align='center'>$tabela[custo]</td>
				<td align='center'>$tabela[marcamodelo]</td>
				<td width='120'><a href='excluir.php?excluir=$tabela[idequipe]'>[excluir]</a>
				<a href='alterar.php?alterar=$tabela[idequipe]'>[alterar]</a></td>
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