<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="aula08.css">

</head>
<body>
	<h2>Cadastro de Funcionario</h2>
	<table border="1" width="600">
		<tr>
			<th>Id</th>
			<th>Funcionario</th>
			<th>Cargo</th>
			<th>Salario</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from funcionarios");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idfunc]</td>
				<td align='center'>$tabela[nome]</td>
				<td align='center'>$tabela[cargo]</td>
				<td align='center'>$tabela[salario]</td>
				<td width='120'><a href='excluir.php?excluir=$tabela[idfunc]'>[excluir]</a>
				<a href='alterar.php?alterar=$tabela[idfunc]'>[alterar]</a></td>
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