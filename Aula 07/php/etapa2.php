<?php
session_start();
$erro_idproduto = "";
$erro_nomeproduto = "";
$erro_descricao = "";
$erro_marca = "";
$erro_preco = "";
$erro_quantidade = "";
$erro_caracteristicas = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
    $_SESSION["idproduto"]  = $_POST["idproduto"];
    $_SESSION["nomeproduto"] = $_POST["nomeproduto"];
    $_SESSION["descricao"] = $_POST["descricao"];
    $_SESSION["marca"] = $_POST["marca"];
    $_SESSION["preco"] = $_POST["preco"];
    $_SESSION["quantidade"] = $_POST["quantidade"];
    $_SESSION["caracteristicas"] = $_POST["caracteristicas"];
    
    if ($_SESSION["idproduto"] == "") {
        $erro_idproduto = "<span style='color:red'>Preencha o ID do produto</span>";
        $erro_validacao ++;
    } 

    if ($_SESSION["nomeproduto"] == "") {
        $erro_nomeproduto = "<span style='color:red'>Preencha o nome do produto</span>";
        $erro_validacao ++;
    } 

    if ($_SESSION["descricao"] == "") {
        $erro_descricao = "<span style='color:red'>Informe a descrição do produto</span>";
        $erro_validacao ++;
    }

    if ($_SESSION["marca"] == "") {
        $erro_marca = "<span style='color:red'>Informe a marca ou fabricante</span>";
        $erro_validacao ++;
    }

    if ($_SESSION["preco"] == "") {
        $erro_preco = "<span style='color:red'>Informe o preço do produto</span>";
        $erro_validacao ++;
    }

    if ($_SESSION["quantidade"] == "") {
        $erro_quantidade = "<span style='color:red'>Informe a quantidade em estoque</span>";
        $erro_validacao ++;
    }

    if ($_SESSION["caracteristicas"] == "") {
        $erro_caracteristicas = "<span style='color:red'>Informe a cor, tamanho ou peso</span>";
        $erro_validacao ++;
    }

    if ($erro_validacao == 0) {
        Header("location:etapa3.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula05.css">
    <title>🛒 Cadastro de Produto</title>
</head>
<body>
<div class="container">
    <h2>Cadastro de Produto</h2>
    <form method="POST" action="etapa2.php" class="signup-form">

        ID do Produto: <input type="text" name="idproduto" placeholder="00001" size="60" maxlength="50" minlength="1"
        value="<?php if (isset($_SESSION["idproduto"])) echo $_SESSION["idproduto"] ?>">
        <?php echo $erro_idproduto ?> 
        <br/><br/>

        Nome do Produto: <input type="text" name="nomeproduto" placeholder="PlayStation 5" size="60" maxlength="50" minlength="3"
        value="<?php if (isset($_SESSION["nomeproduto"])) echo $_SESSION["nomeproduto"] ?>">
        <?php echo $erro_nomeproduto ?> 
        <br/><br/>

        Descrição: <input type="text" name="descricao" placeholder="Console de última geração" size="60" maxlength="100" minlength="5"
        value="<?php if (isset($_SESSION["descricao"])) echo $_SESSION["descricao"] ?>">
        <?php echo $erro_descricao ?> 
        <br/><br/>

        Marca/Fabricante: <input type="text" name="marca" placeholder="Sony" size="60" maxlength="50" minlength="2"
        value="<?php if (isset($_SESSION["marca"])) echo $_SESSION["marca"] ?>">
        <?php echo $erro_marca ?> 
        <br/><br/>

        Preço: <input type="text" name="preco" placeholder="4999.99" size="60" maxlength="20" minlength="1"
        value="<?php if (isset($_SESSION["preco"])) echo $_SESSION["preco"] ?>">
        <?php echo $erro_preco ?> 
        <br/><br/>

        Quantidade em Estoque: <input type="text" name="quantidade" placeholder="10" size="60" maxlength="10" minlength="1"
        value="<?php if (isset($_SESSION["quantidade"])) echo $_SESSION["quantidade"] ?>">
        <?php echo $erro_quantidade ?> 
        <br/><br/>

        Cor/Tamanho/Peso: <input type="text" name="caracteristicas" placeholder="Branco / 4kg" size="60" maxlength="50" minlength="2"
        value="<?php if (isset($_SESSION["caracteristicas"])) echo $_SESSION["caracteristicas"] ?>">
        <?php echo $erro_caracteristicas ?> 
        <br/><br/>

        <input type="submit" value="Prosseguir" name="botao">
    </form>
    <br/>
    <a href="etapa1.php"><button>Voltar</button></a>
</div>
</body>
</html>
