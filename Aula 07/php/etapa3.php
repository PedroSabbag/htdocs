<?php
session_start();
$erro_idvenda = "";
$erro_idcliente = "";
$erro_datavenda = "";
$erro_endereco = "";
$erro_formaentrega = "";
$erro_formapagamento = "";
$erro_idproduto = "";
$erro_quantidade = "";
$erro_precounitario = "";
$erro_subtotal = "";
$erro_valortotal = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
    $_SESSION["idvenda"] = $_POST["idvenda"];
    $_SESSION["idcliente"] = $_POST["idcliente"];
    $_SESSION["datavenda"] = $_POST["datavenda"];
    $_SESSION["endereco"] = $_POST["endereco"];
    $_SESSION["formaentrega"] = $_POST["formaentrega"];
    $_SESSION["formapagamento"] = $_POST["formapagamento"];
    $_SESSION["idproduto"] = $_POST["idproduto"];
    $_SESSION["quantidade"] = $_POST["quantidade"];
    $_SESSION["precounitario"] = $_POST["precounitario"];
    $_SESSION["subtotal"] = $_POST["subtotal"];
    $_SESSION["valortotal"] = $_POST["valortotal"];

    if ($_SESSION["idvenda"] == "") {
        $erro_idvenda = "<span style='color:red'>Preencha o ID da venda</span>";
        $erro_validacao++;
    }

    if ($_SESSION["idcliente"] == "") {
        $erro_idcliente = "<span style='color:red'>Preencha o ID do cliente</span>";
        $erro_validacao++;
    }

    if ($_SESSION["datavenda"] == "") {
        $erro_datavenda = "<span style='color:red'>Informe a data da venda</span>";
        $erro_validacao++;
    }

    if ($_SESSION["endereco"] == "") {
        $erro_endereco = "<span style='color:red'>Informe o endereço de entrega</span>";
        $erro_validacao++;
    }

    if ($_SESSION["formaentrega"] == "") {
        $erro_formaentrega = "<span style='color:red'>Escolha a forma de entrega</span>";
        $erro_validacao++;
    }

    if ($_SESSION["formapagamento"] == "") {
        $erro_formapagamento = "<span style='color:red'>Escolha a forma de pagamento</span>";
        $erro_validacao++;
    }

    if ($_SESSION["idproduto"] == "") {
        $erro_idproduto = "<span style='color:red'>Informe o ID do produto</span>";
        $erro_validacao++;
    }

    if ($_SESSION["quantidade"] == "") {
        $erro_quantidade = "<span style='color:red'>Informe a quantidade</span>";
        $erro_validacao++;
    }

    if ($_SESSION["precounitario"] == "") {
        $erro_precounitario = "<span style='color:red'>Informe o preço unitário</span>";
        $erro_validacao++;
    }

    if ($_SESSION["subtotal"] == "") {
        $erro_subtotal = "<span style='color:red'>Informe o subtotal (quantidade × preço unitário)</span>";
        $erro_validacao++;
    }

    if ($_SESSION["valortotal"] == "") {
        $erro_valortotal = "<span style='color:red'>Informe o valor total da venda</span>";
        $erro_validacao++;
    }

    if ($erro_validacao == 0) {
        Header("confirma.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aula05.css">
    <title>🧾 Cadastro de Venda</title>
</head>
<body>
<div class="container">
    <h2>Cadastro de Venda</h2>
    <form method="POST" action="etapa3.php" class="signup-form">

        ID da Venda: <input type="text" name="idvenda" placeholder="00001" size="60" maxlength="50" minlength="1"
        value="<?php if (isset($_SESSION["idvenda"])) echo $_SESSION["idvenda"] ?>">
        <?php echo $erro_idvenda ?> 
        <br/><br/>

        ID do Cliente: <input type="text" name="idcliente" placeholder="12345" size="60" maxlength="50" minlength="1"
        value="<?php if (isset($_SESSION["idcliente"])) echo $_SESSION["idcliente"] ?>">
        <?php echo $erro_idcliente ?> 
        <br/><br/>

        Data da Venda: <input type="date" name="datavenda"
        value="<?php if (isset($_SESSION["datavenda"])) echo $_SESSION["datavenda"] ?>">
        <?php echo $erro_datavenda ?> 
        <br/><br/>

        Endereço de Entrega: <input type="text" name="endereco" placeholder="Rua Exemplo, 123 - São Paulo" size="60" maxlength="100" minlength="5"
        value="<?php if (isset($_SESSION["endereco"])) echo $_SESSION["endereco"] ?>">
        <?php echo $erro_endereco ?> 
        <br/><br/>

        Forma de Entrega: 
        <select name="formaentrega">
            <option value="">-- Selecione --</option>
            <option value="correios" <?php if (isset($_SESSION["formaentrega"]) && $_SESSION["formaentrega"]=="correios") echo "selected"; ?>>Correios</option>
            <option value="transportadora" <?php if (isset($_SESSION["formaentrega"]) && $_SESSION["formaentrega"]=="transportadora") echo "selected"; ?>>Transportadora</option>
            <option value="retirada" <?php if (isset($_SESSION["formaentrega"]) && $_SESSION["formaentrega"]=="retirada") echo "selected"; ?>>Retirada</option>
        </select>
        <?php echo $erro_formaentrega ?> 
        <br/><br/>

        Forma de Pagamento: 
        <select name="formapagamento">
            <option value="">-- Selecione --</option>
            <option value="cartao" <?php if (isset($_SESSION["formapagamento"]) && $_SESSION["formapagamento"]=="cartao") echo "selected"; ?>>Cartão</option>
            <option value="pix" <?php if (isset($_SESSION["formapagamento"]) && $_SESSION["formapagamento"]=="pix") echo "selected"; ?>>Pix</option>
            <option value="boleto" <?php if (isset($_SESSION["formapagamento"]) && $_SESSION["formapagamento"]=="boleto") echo "selected"; ?>>Boleto</option>
        </select>
        <?php echo $erro_formapagamento ?> 
        <br/><br/>

        ID do Produto: <input type="text" name="idproduto" placeholder="00123" size="60" maxlength="50" minlength="1"
        value="<?php if (isset($_SESSION["idproduto"])) echo $_SESSION["idproduto"] ?>">
        <?php echo $erro_idproduto ?> 
        <br/><br/>

        Quantidade: <input type="number" name="quantidade" placeholder="2" size="60" maxlength="10" minlength="1"
        value="<?php if (isset($_SESSION["quantidade"])) echo $_SESSION["quantidade"] ?>">
        <?php echo $erro_quantidade ?> 
        <br/><br/>

        Preço Unitário: <input type="text" name="precounitario" placeholder="499.99" size="60" maxlength="20" minlength="1"
        value="<?php if (isset($_SESSION["precounitario"])) echo $_SESSION["precounitario"] ?>">
        <?php echo $erro_precounitario ?> 
        <br/><br/>

        Subtotal (Qtd × Preço): <input type="text" name="subtotal" placeholder="999.98" size="60" maxlength="20" minlength="1"
        value="<?php if (isset($_SESSION["subtotal"])) echo $_SESSION["subtotal"] ?>">
        <?php echo $erro_subtotal ?> 
        <br/><br/>

        Valor Total da Venda: <input type="text" name="valortotal" placeholder="1059.98" size="60" maxlength="20" minlength="1"
        value="<?php if (isset($_SESSION["valortotal"])) echo $_SESSION["valortotal"] ?>">
        <?php echo $erro_valortotal ?> 
        <br/><br/>

        <input type="submit" value="Prosseguir" name="botao">
    </form>
    <br/>
    <a href="etapa2.php"><button>Voltar</button></a>
</div>
</body>
</html>
