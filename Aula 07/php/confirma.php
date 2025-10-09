<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula05.css">
    <title>Confirmação da Venda</title>
</head>
<body>
	<?php
	$nome        = $_SESSION["nome"];
	$email       = $_SESSION["email"];
	$cpf         = $_SESSION["cpf"];
	$id          = $_SESSION["id"];
	$cep         = $_SESSION["cep"];
	$numero      = $_SESSION["numero"];
	$rua         = $_SESSION["rua"];
	$complemento = $_SESSION["complemento"];
	$cidade      = $_SESSION["cidade"];
	$estado      = $_SESSION["estado"];
	$telefone    = $_SESSION["telefone"];


	$idproduto        = $_SESSION["idproduto"];
	$nomeproduto      = $_SESSION["nomeproduto"];
	$descricao        = $_SESSION["descricao"];
	$marca            = $_SESSION["marca"];
	$preco            = $_SESSION["preco"];
	$quantidadeestoque = $_SESSION["quantidade"];
	$caracteristicas  = $_SESSION["caracteristicas"];


	$idvenda        = $_SESSION["idvenda"];
	$idcliente      = $_SESSION["idcliente"];
	$datavenda      = $_SESSION["datavenda"];
	$enderecoentrega = $_SESSION["endereco"];
	$formaentrega   = $_SESSION["formaentrega"];
	$formapagamento = $_SESSION["formapagamento"];
	$idprodutovenda = $_SESSION["idproduto"];
	$quantidade     = $_SESSION["quantidade"];
	$precounitario  = $_SESSION["precounitario"];
	$subtotal       = $_SESSION["subtotal"];
	$valortotal     = $_SESSION["valortotal"];

    require("conecta_banco.php");

// --- 1. RECEBENDO E TRATANDO OS DADOS ---
// ETAPA 1 — Cliente
$id_cliente     = $_POST["id"] ?? '';
$nome           = $_POST["nome"] ?? '';
$cpf            = $_POST["cpf"] ?? '';
$email          = $_POST["email"] ?? '';
$telefone       = $_POST["telefone"] ?? '';
$rua            = $_POST["rua"] ?? '';
$numero         = $_POST["numero"] ?? '';
$complemento    = $_POST["complemento"] ?? '';
$cidade         = $_POST["cidade"] ?? '';
$estado         = $_POST["estado"] ?? '';
$cep            = $_POST["cep"] ?? '';

// ETAPA 2 — Produto
$id_produto       = $_POST["idproduto"] ?? '';
$nome_produto     = $_POST["nomeproduto"] ?? '';
$descricao        = $_POST["descricao"] ?? '';
$marca            = $_POST["marca"] ?? '';
$preco            = $_POST["preco"] ?? '';
$quantidade_estoque = $_POST["quantidade"] ?? '';
$caracteristicas  = $_POST["caracteristicas"] ?? '';

// ETAPA 3 — Venda
$id_venda        = $_POST["idvenda"] ?? '';
$data_venda      = $_POST["datavenda"] ?? '';
$endereco_entrega = $_POST["endereco"] ?? '';
$forma_entrega   = $_POST["formaentrega"] ?? '';
$forma_pagamento = $_POST["formapagamento"] ?? '';
$quantidade_venda = $_POST["quantidade"] ?? '';
$preco_unitario  = $_POST["precounitario"] ?? '';
$subtotal        = $_POST["subtotal"] ?? '';
$valor_total     = $_POST["valortotal"] ?? '';


// --- 2. CONEXÃO E INSERÇÃO ---
require("conecta_banco.php");

// Inserção na tabela clientes
$mysqli->query("INSERT INTO clientes (
    id_cliente, nome, cpf, email, telefone, rua, numero, complemento, cidade, estado, cep
) VALUES (
    '$id_cliente', '$nome', '$cpf', '$email', '$telefone', '$rua', '$numero', '$complemento', '$cidade', '$estado', '$cep'
)");

// Inserção na tabela produtos
$mysqli->query("INSERT INTO produtos (
    id_produto, nome_produto, descricao, marca, preco, quantidade_estoque, caracteristicas
) VALUES (
    '$id_produto', '$nome_produto', '$descricao', '$marca', '$preco', '$quantidade_estoque', '$caracteristicas'
)");

// Inserção na tabela vendas
$mysqli->query("INSERT INTO vendas (
    id_venda, id_cliente, data_venda, endereco_entrega, forma_entrega, forma_pagamento, id_produto, quantidade, preco_unitario, subtotal, valor_total
) VALUES (
    '$id_venda', '$id_cliente', '$data_venda', '$endereco_entrega', '$forma_entrega', '$forma_pagamento', '$id_produto', '$quantidade_venda', '$preco_unitario', '$subtotal', '$valor_total'
)");

header("Location: ../index.php?status=cadastro_ok");
exit(); // Sempre bom usar exit() após o header



	echo "<div class='container'>";
	echo "<h2>Confirmação da Venda</h2>";

	echo "<div class='section'>";
	echo "<h3>Dados do Cliente</h3>";
	echo "Nome: $nome <br/>";
	echo "E-mail: $email <br/>";
	echo "CPF: $cpf <br/>";
	echo "ID do Cliente: $id <br/>";
	echo "Telefone: $telefone <br/>";
	echo "Endereço: Rua $rua, Nº $numero, $complemento <br/>";
	echo "Cidade: $cidade - $estado <br/>";
	echo "CEP: $cep <br/>";
	echo "</div>";

	echo "<div class='section'>";
	echo "<h3>Dados do Produto</h3>";
	echo "ID do Produto: $idproduto <br/>";
	echo "Nome do Produto: $nomeproduto <br/>";
	echo "Descrição: $descricao <br/>";
	echo "Marca/Fabricante: $marca <br/>";
	echo "Preço: R$ $preco <br/>";
	echo "Quantidade em Estoque: $quantidadeestoque <br/>";
	echo "Cor/Tamanho/Peso: $caracteristicas <br/>";
	echo "</div>";

	echo "<div class='section'>";
	echo "<h3>Dados da Venda</h3>";
	echo "ID da Venda: $idvenda <br/>";
	echo "ID do Cliente: $idcliente <br/>";
	echo "Data da Venda: $datavenda <br/>";
	echo "Endereço de Entrega: $enderecoentrega <br/>";
	echo "Forma de Entrega: $formaentrega <br/>";
	echo "Forma de Pagamento: $formapagamento <br/>";
	echo "ID do Produto: $idprodutovenda <br/>";
	echo "Quantidade: $quantidade <br/>";
	echo "Preço Unitário: R$ $precounitario <br/>";
	echo "Subtotal: R$ $subtotal <br/>";
	echo "Valor Total da Venda: R$ $valortotal <br/>";
	echo "</div>";

	echo "<br/>";
	echo "<a href='../index.php'><button>Nova Venda</button></a>";
	echo "</div>";
	?>
</body>
</html>
