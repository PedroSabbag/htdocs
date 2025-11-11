<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="aula09.css">
</head>
<body>
    <div class="container">
		<h2> Cadastro Produtos </h2>
	</div>
	<br />
	<table border="1" width="600">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Preço</th>
			<th>Estoque</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("../conecta.php"); 
		
			// executar comandos sql
			$query = $mysqli->query("select * from produtos"); // Tabela 'produtos'
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idprod]</td>
				<td align='center'>$tabela[nomeprod]</td>
				<td align='center'>R$ ".number_format($tabela['preco'], 2, ',', '.')."</td>
				<td align='center'>$tabela[quantidade]</td>
			

				<td width='120'><a href='excprod.php?excluir=$tabela[idprod]'>[excluir]</a>
				<a href='altprod.php?alterar=$tabela[idprod]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
	<div class="botoes-centrais">
        <a href="adprod.php"><button>Adicionar</button></a>
        <a href="pesqprod.php"><button>Pesquisar</button></a>
		<a href="../cadastro.php"><button>Voltar</button></a>
    </div>
</body>
</html>