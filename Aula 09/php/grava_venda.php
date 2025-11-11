<?php
include_once 'conecta.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Escapando dados vindos do formulário
    $nome = $mysqli->real_escape_string($_POST['nomeCliente']);
    $celular = $mysqli->real_escape_string($_POST['celularCliente']);
    $email = $mysqli->real_escape_string($_POST['emailCliente']);

    $produtos = [];
    $subtotal = 0;
    
    // Loop para capturar até 3 produtos
    for ($i = 1; $i <= 3; $i++) {
        $nomeProd = $mysqli->real_escape_string($_POST["nomeProduto$i"]);
        $precoProd = floatval($_POST["precoProduto$i"]);
        $qtdProd = intval($_POST["quantidade$i"]);
        
        if ($nomeProd && $precoProd > 0 && $qtdProd > 0) {
            $totalItem = $precoProd * $qtdProd;
            $subtotal += $totalItem;
            
            $produtos[] = [
                'nome' => $nomeProd, 
                'preco' => $precoProd, 
                'qtd' => $qtdProd, 
                'total' => $totalItem
            ];
        }
    }
    
    // Calcula valores finais
    $valorFrete = floatval($_POST['frete']);
    $valorTotal = $subtotal + $valorFrete;
    
    // Converte produtos para JSON
    $itens_json = json_encode($produtos, JSON_UNESCAPED_UNICODE);

    // Monta a query de inserção
    $sql = "INSERT INTO vendas (
                nome_cliente, celular_cliente, email_cliente, 
                itens_vendidos, subtotal, valor_frete, valor_total
            ) VALUES (
                '{$nome}', '{$celular}', '{$email}',
                '{$itens_json}', {$subtotal}, {$valorFrete}, {$valorTotal}
            )";

    // Executa a query
    if ($mysqli->query($sql) === TRUE) {
        $ultima_venda = $mysqli->insert_id;
        echo "<h1>Venda Registrada com Sucesso!</h1>";
        echo "<p>ID da Venda: {$ultima_venda}</p>";
        echo "<p>Total: R$ " . number_format($valorTotal, 2, ',', '.') . "</p>";
        
    } else {
        echo "<h1>Erro ao Registrar Venda!</h1>";
        echo "<p>Detalhes do Erro: " . $mysqli->error . "</p>";
    }

    $mysqli->close();
    
} else {
    echo "<h1>Acesso Inválido</h1>";
    echo "<p>Esta página deve ser acessada através do formulário de vendas.</p>";
}

echo '<p><a href="venda.php">Voltar para a tela de vendas</a></p>';
?>
