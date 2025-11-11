<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Vendedores</h2>
	<link rel="stylesheet" type="text/css" href="aula09.css">
	<br />
	<table border="1" width="400">
		<tr>
			<th>Id</th>
			<th>CPF</th>
			<th>Nome</th>
			<th>Ações</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("../conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from vendedores");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idvendedor]</td>
				<td align='center'>$tabela[cpf]</td>
				<td align='center'>$tabela[nome]</td>
			

				<td width='120'><a href='exvend.php?excluir=$tabela[idvendedor]'>[excluir]</a>
				<a href='altvend.php?alterar=$tabela[idvendedor]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
	<div class="botoes-centrais">
        <a href="addvend.php"><button>Adicionar</button></a>
        <a href="pesqvend.php"><button>Pesquisar</button></a>
		<a href="../cadastro.php"><button>Voltar</button></a>
    </div>
</body>
</html>