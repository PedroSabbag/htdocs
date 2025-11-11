// Adiciona um evento de clique ao botão "Clientes"
document.getElementById("clientesBtn").addEventListener("click", function() {
    // Redireciona para a pasta 'clientes'
    window.location.href = "clientes/clientes.php"; 
});

// Adiciona um evento de clique ao botão "vendedores"
document.getElementById("vendedoresBtn").addEventListener("click", function() {
    // CORRIGIDO: Redireciona para a pasta 'venda'
    window.location.href = "vendas/vendedores.php"; 
});

// Adiciona um evento de clique ao botão "Produtos"
document.getElementById("produtosBtn").addEventListener("click", function() {
    // Redireciona para a pasta 'produto' (Assumindo que você criou a pasta 'produto')
    window.location.href = "produtos/produtos.php";
});

// Adiciona um evento de clique ao botão "Voltar"
document.getElementById("voltarBtn").addEventListener("click", function() {
    // Redireciona para o arquivo index.php
    window.location.href = "../index.php";
});