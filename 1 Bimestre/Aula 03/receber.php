<?php
    // Dados do cliente
    $nome      = $_POST["nome"]      ?? "";
    $cpf       = $_POST["cpf"]       ?? "";
    $endereco  = $_POST["endereco"]  ?? "";
    $bairro    = $_POST["bairro"]    ?? "";
    $telefone  = $_POST["telefone"]  ?? "";
    $sexo      = $_POST["sexo"]      ?? "";

    // Nintendo
    $codNintendo = $_POST["codNintendo"] ?? 0;
    if ($codNintendo == 2){
        $nintendo = "Pokémon"; $precoN = 349.99;
    } elseif ($codNintendo == 3){
        $nintendo = "Zelda"; $precoN = 399.99;
    } elseif ($codNintendo == 4){
        $nintendo = "Mario"; $precoN = 299.99;
    } else {
        $nintendo = "Nenhum"; $precoN = 0;
    }
    $qtdN = $_POST["qtdNintendo"] ?? 0;
    $subN = $precoN * $qtdN;

    // PS5
    $codPs5 = $_POST["codPs5"] ?? 0;
    if ($codPs5 == 2){
        $ps5 = "Spider-Man 2"; $precoP = 349.99;
    } elseif ($codPs5 == 3){
        $ps5 = "The Last of Us 2"; $precoP = 349.99;
    } elseif ($codPs5 == 4){
        $ps5 = "God of War 4"; $precoP = 399.99;
    } else {
        $ps5 = "Nenhum"; $precoP = 0;
    }
    $qtdP = $_POST["qtdPs5"] ?? 0;
    $subP = $precoP * $qtdP;

    // Xbox
    $codXbox = $_POST["codXbox"] ?? 0;
    if ($codXbox == 2){
        $xbox = "Cyberpunk 2077"; $precoX = 299.99;
    } elseif ($codXbox == 3){
        $xbox = "Halo 4"; $precoX = 349.99;
    } elseif ($codXbox == 4){
        $xbox = "Forza Horizon 5"; $precoX = 349.99;
    } else {
        $xbox = "Nenhum"; $precoX = 0;
    }
    $qtdX = $_POST["qtdXbox"] ?? 0;
    $subX = $precoX * $qtdX;

    // Consoles
    $codConsole = $_POST["codConsole"] ?? 0;
    if ($codConsole == 1){
        $console = "Nintendo Switch"; $precoC = 2499.99;
    } elseif ($codConsole == 2){
        $console = "PS5"; $precoC = 3999.99;
    } elseif ($codConsole == 3){
        $console = "Xbox Series X"; $precoC = 3799.99;
    } else {
        $console = "Nenhum"; $precoC = 0;
    }
    $qtdC = $_POST["qtdConsole"] ?? 0;
    $subC = $precoC * $qtdC;

    // Entrega
    $codEntrega = $_POST["codEntrega"] ?? 1;
    if ($codEntrega == 1){
        $entrega = "Código Digital (Email)"; $taxaEntrega = 0;
    } else {
        $entrega = "Receber em Casa"; $taxaEntrega = 15;
    }

    // Pagamento
    $codPagto = $_POST["formaPagamento"] ?? "pix";
    if ($codPagto == "pix"){
        $fpagto = "Pix";
    } elseif ($codPagto == "credito"){
        $fpagto = "Cartão de Crédito";
    } else {
        $fpagto = "Cartão de Débito";
    }
    $parcelas = $_POST["parcelas"] ?? 1;

    // Promoções
    $receber1 = isset($_POST["receber1"]);
    $receber2 = isset($_POST["receber2"]);

    // Total
    $vtotal = $subN + $subP + $subX + $subC + $taxaEntrega;

    // Função de formatação
    function moeda($v){
        return "R$ " . number_format($v, 2, ',', '.');
    }
    echo "<h2><center>Planeta dos Jogos</center></h2>";

echo "<h3>Dados do Cliente</h3>";	
echo "Cliente: $nome<br />";
echo "CPF: $cpf<br />";
echo "Telefone: $telefone<br />";
echo "Endereço: $endereco<br />";
echo "Bairro: $bairro <br />";
echo "Sexo: $sexo <br /><br />";

echo "<h3>Dados do Pedido</h3>";

if ($qtdN > 0){
    echo "Produto: $nintendo<br />";
    echo "Valor unitário: ".moeda($precoN)."<br />";
    echo "Quantidade: $qtdN<br />";
    echo "Subtotal: ".moeda($subN)."<br /><br />";
}

if ($qtdP > 0){
    echo "Produto: $ps5<br />";
    echo "Valor unitário: ".moeda($precoP)."<br />";
    echo "Quantidade: $qtdP<br />";
    echo "Subtotal: ".moeda($subP)."<br /><br />";
}

if ($qtdX > 0){
    echo "Produto: $xbox<br />";
    echo "Valor unitário: ".moeda($precoX)."<br />";
    echo "Quantidade: $qtdX<br />";
    echo "Subtotal: ".moeda($subX)."<br /><br />";
}

if ($qtdC > 0){
    echo "Produto: $console<br />";
    echo "Valor unitário: ".moeda($precoC)."<br />";
    echo "Quantidade: $qtdC<br />";
    echo "Subtotal: ".moeda($subC)."<br /><br />";
}

echo "Entrega escolhida: $entrega<br />";
echo "Taxa de entrega: ".moeda($taxaEntrega)."<br /><br />";

if ($receber1 || $receber2){
    echo "<h3>Ofertas e Promoções</h3>";
    if ($receber1) echo "Desejo receber mensagens sobre promoções <br />";
    if ($receber2) echo "Desejo receber mensagens sobre novos produtos <br />";
    echo "<br />";
}

echo "<h3>Finalização do Pedido</h3>";
echo "Forma de Pagamento: $fpagto<br />";
if ($codPagto == "credito"){
    echo "Parcelado em $parcelas x<br />";
}
echo "Valor total: ".moeda($vtotal)."<br />";
?>

?>