<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula05.css">
    <title> Livraria</title>
</head>
<body>
	<?php
		$total_compra = 0;

    	// recebendo dados - etapa 1
		$nome   = $_SESSION["nome"]; 
		$email  = $_SESSION["email"]; 
		$sexo   = $_SESSION["sexo"]; 
		$cpf    = $_SESSION["cpf"]; 
		$telefone = $_SESSION["telefone"];
		$cidade = $_SESSION["cidade"];
		$estado = $_SESSION["estado"];
		$endereco = $_SESSION["endereco"];
		$numero   = $_SESSION["numero"];
		$cep      = $_SESSION["cep"];

		if ($sexo == 1){
			$sexo = "Masculino";
		} else {
			$sexo = "Feminino";		
		}

    	// recebendo dados - etapa 2
		// Livro Educacional 1
$livro1 = $_SESSION["livro1"];
$qtdade1 = $_SESSION["qtdade1"];
$preco1 = 0;
$nome_livro1 = "";

if ($livro1 == "1") {
    $nome_livro1 = "Ciência da Computação";
    $preco1 = 399.00;
} elseif ($livro1 == "2") {
    $nome_livro1 = "Medicina";
    $preco1 = 499.00;
} elseif ($livro1 == "3") {
    $nome_livro1 = "Direito";
    $preco1 = 349.00;
} elseif ($livro1 == "4") {
    $nome_livro1 = "Engenharia Civil";
    $preco1 = 249.00;
}
$total_compra += $preco1 * $qtdade1;

// Quadrinhos (Livro 2)
$livro2 = $_SESSION["livro2"];
$qtdade2 = $_SESSION["qtdade2"];
$preco2 = 0;
$nome_livro2 = "";

if ($livro2 == "1") {
    $nome_livro2 = "Nenhum Quadrinho";
} elseif ($livro2 == "2") {
    $nome_livro2 = "Batman: A Piada Mortal";
    $preco2 = 399.00;
} elseif ($livro2 == "3") {
    $nome_livro2 = "Sandman";
    $preco2 = 349.00;
} elseif ($livro2 == "4") {
    $nome_livro2 = "Watchmen";
    $preco2 = 249.00;
} elseif ($livro2 == "5") {
    $nome_livro2 = "Akira";
    $preco2 = 299.00;
}
$total_compra += $preco2 * $qtdade2;


	// Livros 3
		$produtos = $_SESSION["livro3"];
		$qtdade3  = $_SESSION["qtdade3"];
		$preco3   = 0;
		$nome_produto = [];

		if (in_array("2", $livro3)) { $nome_livro3[] = "Senhor dos Anéis (BOX)"; $preco3 += 900.00; }
		if (in_array("3", $livro3)) { $nome_livro3[] = "O Hobbit"; $preco3 += 200.00; }
		if (in_array("4", $livro3)) { $nome_livro3[] = "Harry Potter (BOX)"; $preco3 += 700.00; }
		if (in_array("5", $livro3)) { $nome_livro3[] = "As Crônicas de Nárnia"; $preco3 += 199.00; }

		$total_compra += $preco3 * $qtdade3;

    	$pagamento_nome = '';
if ($pagamento_id === '1') {
    $pagamento_nome = 'Cartão de Crédito';
} elseif ($pagamento_id === '2') {
    $pagamento_nome = 'Cartão de Débito';
} elseif ($pagamento_id === '3') {
    $pagamento_nome = 'PIX';
} elseif ($pagamento_id === '4') {
    $pagamento_nome = 'PicPay';
} elseif ($pagamento_id === '5') {
    $pagamento_nome = 'Boleto';
}
 
$entrega_nome = '';
$entrega_taxa = 0;
if ($entrega_id === '1') {
    $entrega_nome = 'Fisica';
    $entrega_taxa = 0.00;
} elseif ($entrega_id === '2') {
    $entrega_nome = 'Normal';
    $entrega_taxa = 7.00;
} elseif ($entrega_id === '3') {
    $entrega_nome = 'Expressa';
    $entrega_taxa = 10.00;
}

		//Confirmando os dados

    echo "<div class='container'>";
	echo "<h2> Confirmação do Pedido </h2>";

	echo "<div class='section'>";
	echo "<h3> Dados do Cliente </h3>";
	echo "Nome: $nome <br/>";
	echo "E-mail: $email <br/>";
	echo "CPF: $cpf <br/>";
	echo "Telefone: $telefone <br/>";
	echo "Sexo: $sexo <br/>";
	echo "Endereço: $endereco, $numero - $cidade / $estado <br/>";
	echo "CEP: $cep <br/>";
	echo "</div>";

	echo "<div class='section'>";
	echo "<h3> Itens do Pedido </h3>";
	echo "Jogo Nintendo: $nome_jogo1 | Quantidade: $qtdade1 | Preço: R$ $preco1 <br/>";
	echo "Jogo PS5: $nome_jogo2 | Quantidade: $qtdade2 | Preço: R$ $preco2 <br/>";
	if (!empty($nome_produto)) {
    echo "Consoles/Produtos: " . implode(', ', $nome_produto) . " | Quantidade: $qtdade3 | Preço Unitário: R$ $preco3 <br/>";
	}
	echo "Subtotal: R$ " . number_format($total_compra, 2, ',', '.') . "<br/>";
	echo "</div>";

	echo "<div class='section'>";
	echo "<h3> Pagamento e Frete </h3>";
	echo "Forma de pagamento: $fpagto <br/>";
	echo "Valor com desconto/acréscimo: R$ " . number_format($valorpg, 2, ',', '.') . "<br/>";
	if ($vparc > 0) {
    echo "Parcelas de: R$ " . number_format($vparc, 2, ',', '.') . "<br/>";
	}
	echo "Frete: $frete <br/>";
	echo "Valor do Frete: R$ " . number_format($valor_frete, 2, ',', '.') . "<br/>";
	echo "<strong>Valor Final da Compra: R$ " . number_format($valor_final, 2, ',', '.') . "</strong>";
	echo "</div>";

	echo "<a href='../index.php'><button>Nova Venda</button></a>";
	echo "</div>";
	?>
</html>