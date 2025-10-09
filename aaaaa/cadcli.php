<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dados do Cliente</title>
    <link rel="stylesheet" href="aula05.css"> 
</head>
<body>
<div class="container">
    <h1>Etapa 1 - Dados do Cliente</h1>
    <form action="gravacli.php" method="post"> 

        <label>Nome completo:</label>
        <input type="text" name="nome" required> 

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <label>ID do Cliente:</label>
        <input type="text" name="id_cliente" required> 

        <label>Telefone:</label>
        <input type="tel" name="telefone" required>


        <label>Cidade:</label>
        <input type="text" name="data_nasc" required> 

        <label>Estado:</label>
        <input type="text" name="riotid" required>

        <label>Numero:</label>
        <input type="text" name="campeao" required>


        <label>Rua:</label>
        <input type="text" name="bairro" required> 

        <label>Complemento (Opcional):</label>
        <input type="text" name="complemento"> 

        <label>CEP:</label>
        <input type="text" name="cep" required> 
        
        <div class="botoes">
            <a href="../index.php" class="botao">Voltar</a>
            <input type="submit" value="Cadastrar Cliente" name="botao">
        </div>
    </form>
</div>
</body>
</html>