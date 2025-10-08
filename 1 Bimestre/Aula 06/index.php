<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Trabalho 1 Marco</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        main {
            padding: 30px;
        }

        h2 {
            margin-top: 40px;
            font-size: 24px;
        }

        p {
            line-height: 1.6;
            text-align: justify;
        }

        .produtos {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 20px;
        }

        .produto {
            width: 30%;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .produto img {
            width: 100%;
            max-height: 200px;
            object-fit: contain;
            border-radius: 4px;
        }

        .preco {
            margin-top: 10px;
            font-size: 18px;
            color: green;
            font-weight: bold;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .produto {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    🕹️🎮 Planeta dos Jogos 🕹️🎮
</header>

<main>
    <section>
        <h2>Bem-vindo a Loja de Jogos Nintendo</h2>
        <p>
            Os jogos da Nintendo marcaram gerações com suas histórias cativantes, personagens icônicos e mundos cheios de magia. 
            Das corridas eletrizantes de Mario Kart às batalhas emocionantes de Pokémon, 
            passando pelas aventuras épicas de The Legend of Zelda, a diversão é garantida para todos os tipos de jogadores.
            Em nossa loja, você encontra desde os grandes clássicos até os lançamentos mais recentes para viver experiências inesquecíveis.


        </p>
    </section>

    <section>
        <h2>Jogos Populares</h2>
        <div class="produtos">
            <div class="produto">
                <img src="mario.jpg" alt="Super Mario">
                <div class="preco">R$ 199,90</div>
            </div>
            <div class="produto">
                <img src="pokemon.jpg" alt="Pokémon">
                <div class="preco">R$ 249,90</div>
            </div>
            <div class="produto">
                <img src="zelda.jpg" alt="Sonic">
                <div class="preco">R$ 229,90</div>
            </div>
        </div>
    </section>
</main>
<footer>
    <a href="php/etapa1.php">Compra de Produtos</a>
</footer>

</body>
</html>
