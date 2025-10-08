<!DOCTYPE html>
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
                <h2>Dados do Cliente</h2>
                <form action="etapa2.php" method="post">

                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" size="50" maxlength="50" required title="Digite apenas letras e espaços">
                <br><br>

                <label for="cpf">CPF:</label><br>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
                <br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" size="50" maxlength="50" required title="Digite um email válido">
                <br><br>

                <label for="idade">Data de Nascimento:</label><br>
                <input type="date" id="idade" name="idade" required>
                <br><br>

                <button type="submit">Próximo</button>
            </form>
        </section>
        </main>
    </div>
</body>
</html>