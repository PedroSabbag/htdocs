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
