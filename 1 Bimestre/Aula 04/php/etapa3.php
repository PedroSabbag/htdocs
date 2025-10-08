<!DOCTYPE html>
<?php
    // recebendo formulário vendacli
	$cpf   = $_POST["cpf"];
	$nome  = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];

	// Produto 1
    $prod1 = $_POST["prod1"];
    if ($prod1 == 1){
        $prod1="Pokémon";
        $preco1=399.00;
    }
    elseif ($prod1 == 2){
        $prod1="Zelda";
        $preco1=349.00;
    }
    elseif ($prod1 == 3){
        $prod1="Mario";
        $preco1=299.00;
    }
    elseif ($prod1 == 4){
        $prod1="Sonic";
        $preco1=249.00;
    }
    else{
        $prod1="Nenhum Produto";
        $preco1=0;
    }
    $qtd1   = $_POST["qtd1"];

    // Produto 2
   	$prod2 = $_POST["prod2"];
    if ($prod2 == 1){
        $prod2="The Last of Us";
        $preco2=299.00;
    }
    elseif ($prod2 == 2){
        $prod2="God of War IV";
        $preco2=249.00;
    }
    elseif ($prod2 == 3){
        $prod2="Spider Man";
        $preco2=299.00;
    }
    elseif ($prod2 == 4){
        $prod2="Elden Ring";
        $preco2=349.00;
    }
    else{
        $prod2="Nenhum Produto";
        $preco2=0;
    }
    $qtd2 = $_POST["qtd2"];

    // Produto 3
    $prod3 = $_POST["prod3"];
    if ($prod3 == 1){
        $prod3="Forza Horizon V";
        $preco3=349.00;
    }
    elseif ($prod3 == 2){
        $prod3="Age of Empires IV";
        $preco3=249.00;
    }
    elseif ($prod3 == 3){
        $prod3="Age of Mythology";
        $preco3=249.00;
    }
    elseif ($prod3 == 4){
        $prod3="Halo IV";
        $preco3=199.00;
    }
    else {
        $prod3="Nenhum Produto";
        $preco3=0;
    }
    $qtd3 = $_POST["qtd3"];

    // Produto 4
    $prod4 = $_POST["prod4"];
    if ($prod4 == 1){
        $prod4="PS5";
        $preco4=3200.00;
    }
    elseif ($prod4 == 2){
        $prod4="Xbox";
        $preco4=2600.00;
    }
    elseif ($prod4 == 3){
        $prod4="Nintendo Switch";
        $preco4=1700.00;
    }
    else {
        $prod4="Nenhum Produto";
        $preco4=0;
    }
    $qtd4  = $_POST["qtd4"];

    // Produto 5
    $prod5 = $_POST["prod5"];
    if ($prod5 == 1){
        $prod5="Controle PS5";
        $preco5=399.00;
    }
    elseif ($prod5 == 2){
        $prod5="Controle Xbox";
        $preco5=499.00;
    }
    elseif ($prod5 == 3){
        $prod5="Controle Nintendo";
        $preco5=299.00;
    }
    elseif ($prod5 == 4){
        $prod5="Headset Console";
        $preco5=599.00;
    }
    else {
        $prod5="Nenhum Produto";
        $preco5=0;
    }
    $qtd5   = $_POST["qtd5"];
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula04.css">
    <title>🕹️🎮 Planeta dos Jogos 🕹️🎮</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>🕹️🎮 Planeta dos Jogos 🕹️🎮</h1>
        </header>
        <main>
            <section class="section">
                <h2>Forma de Pagamento e Frete</h2>
                <form action="confirma.php" method="post">
        		<input type="hidden" name="cpf" value="<?php echo $cpf;?>">
        		<input type="hidden" name="nome" value="<?php echo $nome;?>">
        		<input type="hidden" name="email" value="<?php echo $email;?>">
        		<input type="hidden" name="idade" value="<?php echo $idade;?>">

				<input type="hidden" name="prod1" value="<?php echo $prod1;?>">
				<input type="hidden" name="preco1"value="<?php echo $preco1;?>">
				<input type="hidden" name="qtd1"  value="<?php echo $qtd1;?>">

				<input type="hidden" name="prod2" value="<?php echo $prod2;?>">
				<input type="hidden" name="preco2"value="<?php echo $preco2;?>">
				<input type="hidden" name="qtd2"  value="<?php echo $qtd2;?>">

				<input type="hidden" name="prod3" value="<?php echo $prod3;?>">
				<input type="hidden" name="preco3"value="<?php echo $preco3;?>">
				<input type="hidden" name="qtd3"  value="<?php echo $qtd3;?>">

				<input type="hidden" name="prod4" value="<?php echo $prod4;?>">
				<input type="hidden" name="preco4"value="<?php echo $preco4;?>">
				<input type="hidden" name="qtd4"  value="<?php echo $qtd4;?>">

				<input type="hidden" name="prod5" value="<?php echo $prod5;?>">
				<input type="hidden" name="preco5"value="<?php echo $preco5;?>">
				<input type="hidden" name="qtd5"  value="<?php echo $qtd5;?>">

                <div class="info">
                    <label for="fpagto">Escolha a Forma de Pagamento:</label>
                    <select name="fpagto">
                        <option value="1">Boleto - Desconto de 10%</option>
                        <option value="2">6x no Crédito sem Juros</option>
                        <option value="3">12x no Crédito - 12% de Juros</option>
                        <option value="4">PIX - Desconto de 15%</option>
                        <option value="5">Débito - Sem Juros</option>
                    </select>
                </div>

                <br/><br/>
                <h2>Endereço de Entrega</h2>
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" required>
                <br/><br/>

                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" required>
                <br/><br/>

                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" required>
                <br/><br/>

                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" required>
                <br/><br/>

                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" required>
                <br/><br/>

                <label for="frete">Escolha o Frete:</label>
                <select name="frete">
                    <option value="1">Sedex - R$ 50,00</option>
                    <option value="2">PAC - R$ 30,00</option>
                    <option value="3">Retirada na Loja - Grátis</option>
                </select>
                <br/><br/>

                <button type="submit">Próxima</button>
            </form>
            </section>
        </main>
    </div>
</body>
</html>