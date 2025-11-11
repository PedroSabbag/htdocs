<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="aula09.css">
</head>
<body>
	<h2>Cadastro de Clientes</h2>
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
			$query = $mysqli->query("select * from tb_clientes");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idcli]</td>
				<td align='center'>$tabela[cpfcli]</td>
				<td align='center'>$tabela[nomecli]</td>
			

				<td width='120'><a href='exccli.php?excluir=$tabela[idcli]'>[excluir]</a>
				<a href='altcli.php?alterar=$tabela[idcli]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
	<div class="botoes-centrais">
        <a href="adcli.php"><button>Adicionar</button></a>
        <a href="pesqcli.php"><button>Pesquisar</button></a>
		<a href="../cadastro.php"><button>Voltar</button></a>
    </div>
</body>
</html>