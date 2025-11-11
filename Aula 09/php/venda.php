<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vendas </title>
    <link rel="stylesheet" href="venda_styles.css">
</head>
<body>

    <header>
        <h1>Registro de Venda - Supermercado Encontrei</h1>
    </header>

    <form class="container" action="grava_venda.php" method="POST">
        
        <section class="cliente-info">
            <h2>Dados do Cliente</h2>
            <label for="nomeCliente">Nome:</label>
            <input type="text" id="nomeCliente" name="nomeCliente" required>

            <label for="celularCliente">Celular:</label>
            <input type="tel" id="celularCliente" name="celularCliente" required>

            <label for="emailCliente">E-mail:</label>
            <input type="email" id="emailCliente" name="emailCliente" required>
        </section>

        <section class="produtos">
            <h2>Itens da Venda</h2>
            <div class="item-venda">
                Nome:<input type="text" name="nomeProduto1" placeholder="Nome do Produto 1">
                Preço: <input type="number" name="precoProduto1" placeholder="Preço Unitario" min="0.00" value="0.00">
                Quantidade:<input type="number" name="quantidade1" placeholder="Qtd" min="1" value="1">
            </div>
            <div class="item-venda">
                Nome:<input type="text" name="nomeProduto2" placeholder="Nome do Produto 2">
                Preço:<input type="number" name="precoProduto2" placeholder="Preço Unitario."  value="0.00">
                Quantidade:<input type="number" name="quantidade2" placeholder="Qtd" min="1" value="1">
            </div>
            <div class="item-venda">
                Nome:<input type="text" name="nomeProduto3" placeholder="Nome do Produto 3">
                Preço:<input type="number" name="precoProduto3" placeholder="Preço Unitario" value="0.00">
                Quantidade:<input type="number" name="quantidade3" placeholder="Qtd" min="1" value="1">
            </div>
        </section>

        <section class="frete-opcoes">
            <h2>Opções de Frete</h2>
            <label>
                <input type="radio" name="frete" value="10.00" checked> Frete Econômico (R$ 10,00)
            </label><br>
            <label>
                <input type="radio" name="frete" value="25.00"> Frete Padrão (R$ 25,00)
            </label><br>
            <label>
                <input type="radio" name="frete" value="45.00"> Frete Expresso (R$ 45,00)
            </label>
        </section>
        
        <button type="submit" id="finalizarBtn">Finalizar e Gravar Venda</button>
        <a href="../index.php" class="voltar-btn">Voltar para o Início</a>

    </form>
    
		
</html>