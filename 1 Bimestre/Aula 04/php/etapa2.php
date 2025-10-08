<!DOCTYPE html>
<?php
	$cpf   = $_POST["cpf"];
	$nome  = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula04.css">
    <title>🕹️🎮 Planeta dos Jogos 🕹️🎮</title>
</head>
<body>
    <header>
        <h1>🕹️🎮 Planeta dos Jogos 🕹️🎮</h1>
    </header>
    <main>
    <section class="signup-form">
     <h2>Produtos da Loja !</h2>
     <form action="etapa3.php" method="post">

        
        <input type="hidden" name="cpf" value="<?php echo $cpf;?>">
        <input type="hidden" name="nome" value="<?php echo $nome;?>">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="idade" value="<?php echo $idade;?>">

        <fieldset>
            <legend>Jogos Nintendo</legend>
            <select name="prod1">
                <option value="0">Nenhum Produto</option>
                <option value="1">Pokémon - R$ 399,00</option>
                <option value="2">Zelda - R$ 349,00</option>
                <option value="3">Mario - R$ 299,00</option>
                <option value="4">Sonic - R$ 249,00</option>
            </select>
            Quantidade
            <select name="qtd1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </fieldset>
        <br/><br/>

        <fieldset>
            <legend>Jogos PS5</legend>
            <select name="prod2">
                <option value="0">Nenhum Produto</option>
                <option value="1">The Last of Us - R$ 299,00</option>
                <option value="2">God of War IV - R$ 249,00</option>
                <option value="3">Spider Man - R$ 299,00</option>
                <option value="4">Elden Ring - R$ 349,00</option>
            </select>
            Quantidade
            <select name="qtd2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </fieldset>
        <br/><br/>

        <fieldset>
        <legend>Jogos Xbox</legend>
            <select name="prod3">
                <option value="0">Nenhum Produto</option>
                <option value="1">Forza Horizon V- R$ 349,00</option>
                <option value="2">Age of Empires IV - R$ 249,00</option>
                <option value="3">Age of Mythology - R$ 249,00</option>
                <option value="4">Halo IV- R$ 199,00</option>
            </select>
            Quantidade
            <select name="qtd3">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </fieldset>
        <br/><br/>

        <fieldset>
            <legend>Escolha seu Console</legend>
            <select name="prod4">
                <option value="0">Nenhum Produto</option>
                <option value="1">PS5 - R$ 3200,00</option>
                <option value="2">Xbox - R$ 2600,00</option>
                <option value="3">Nintendo Switch - R$ 1700,00</option>
            </select>
            Quantidade
            <select name="qtd4">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </fieldset>
        <br/><br/>

        <fieldset>
            <legend>Acessorios Console</legend>
            <select name="prod5">
                <option value="0">Nenhum Produto</option>
                <option value="1">Controle PS5 - R$ 399,00</option>
                <option value="2">Controle Xbox - R$ 499,00</option>
                <option value="3">Controle Nintendo - R$ 299,00</option>
                <option value="4">Headset Console - R$ 599,00</option>
            </select>
            Quantidade
            <select name="qtd5">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </fieldset>
        <br/><br/>

        <button type="submit">Próxima</button>
     </form>
    </main>
</body>
</html>