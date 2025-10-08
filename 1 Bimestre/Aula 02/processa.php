<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Recebidos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #E8F5E9;
            color: #2E7D32;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            width: 700px;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #388E3C;
            border-bottom: 2px solid #66BB6A;
            padding-bottom: 10px;
            text-align: center;
        }

        h2 {
            margin-top: 25px;
            padding-top: 10px;
            border-top: 1px solid #C8E6C9;
            color: #2E7D32;
        }

        p {
            line-height: 1.6;
            color: #2E7D32;
        }

        strong {
            color: #1B5E20;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #2E7D32;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dados Recebidos</h1>

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            function sanitize($data) {
                return htmlspecialchars(stripslashes(trim($data)));
            }

            echo "<h2>Dados do Cliente</h2>";
            echo "<p><strong>CPF:</strong> " . sanitize($_POST['cpf']) . "</p>";
            echo "<p><strong>Nome:</strong> " . sanitize($_POST['nome']) . "</p>";
            echo "<p><strong>Endereço:</strong> " . sanitize($_POST['endereco']) . "</p>";
            echo "<p><strong>CEP:</strong> " . sanitize($_POST['cep']) . "</p>";
            echo "<p><strong>Cidade:</strong> " . sanitize($_POST['cidade']) . "</p>";
            echo "<p><strong>Estado:</strong> " . sanitize($_POST['estado']) . "</p>";
            echo "<p><strong>Sexo:</strong> " . (isset($_POST['sexo']) ? sanitize($_POST['sexo']) : "Não informado") . "</p>";

            $emails = isset($_POST['emails']) ? "Sim" : "Não";
            $notificacao = isset($_POST['notificacao']) ? "Sim" : "Não";

            echo "<p><strong>Receber emails:</strong> " . $emails . "</p>";
            echo "<p><strong>Receber notificação:</strong> " . $notificacao . "</p>";
            echo "<p><strong>Anime Preferido:</strong> " . sanitize($_POST['anime']) . "</p>";

            echo "<h2>Dados do Pedido</h2>";
            echo "<p><strong>Produto:</strong> " . sanitize($_POST['produto']) . "</p>";

            $preco = floatval(str_replace(',', '.', sanitize($_POST['preco'])));
            echo "<p><strong>Preço:</strong> R$ " . number_format($preco, 2, ',', '.') . "</p>";

            echo "<p><strong>Quantidade:</strong> " . sanitize($_POST['quantidade']) . "</p>";

        } else {
            echo "<p>Nenhum dado foi enviado.</p>";
        }
        ?>

        <a href="index5.html">← Voltar para o formulário</a>
    </div>
</body>
</html>
        