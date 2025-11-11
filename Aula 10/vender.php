<?php
	require("conecta.php");
	$contador = $_POST["contador"];
	
	if ($contador > 0) {
		for ($i=0; $i < $contador; $i++) { 
			$idvenda = $_POST["idcompra_".$i];
			$produto = $mysqli->real_escape_string($_POST["produto_".$i]);
			$preco = $_POST["preco_".$i];
			$quantidade = $_POST["quantidade_".$i]; 
			
			$mysqli->query("INSERT INTO vendas (idvenda, produto, preco, quantidade) VALUES('$idvenda','$produto','$preco','$quantidade')");
		}
		
		$mysqli->query("DELETE FROM compras");
	}
	
	header("Location: index.php");
	exit;
?>