<?php
require("conecta.php");

$idprod = 0;
$produto = "";
$preco = "";
$quantidade = "";
$mensagem = "";
$estilo_mensagem = "color: green;";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idprod'])) {
    
    $idprod_post = intval($_POST['idprod']);
    $produto_post = $mysqli->real_escape_string($_POST['produto']);
    $preco_post = floatval($_POST['preco']); 
    $quantidade_post = intval($_POST['quantidade']);

    $sql_update = "UPDATE produtos 
                   SET produto = '{$produto_post}', 
                       preco = '{$preco_post}', 
                       quantidade = '{$quantidade_post}' 
                   WHERE idprod = {$idprod_post}";

    if ($mysqli->query($sql_update)) {
        $mensagem = "Alteração realizada com sucesso!";
        $estilo_mensagem = "color: #28a745;"; // Verde
    } else {
        $mensagem = "Erro ao alterar: " . $mysqli->error;
        $estilo_mensagem = "color: #dc3545;"; // Vermelho
    }
    
    $idprod = $idprod_post;
    $produto = $produto_post;
    $preco = $preco_post;
    $quantidade = $quantidade_post;

} 


$id_param = (isset($_GET["idprod"])) ? intval($_GET["idprod"]) : $idprod; 

if ($id_param > 0) {
    $busca = $mysqli->query("SELECT * FROM produtos WHERE idprod = $id_param") or die($mysqli->error);
    
    if ($busca->num_rows > 0) {
        $row = $busca->fetch_assoc();
        $idprod = $row['idprod'];
        $produto = $row['produto'];
        $preco = $row['preco'];
        $quantidade = $row['quantidade'];
    } else {
        $mensagem = "Produto não encontrado!";
        $estilo_mensagem = "color: #dc3545;";
    }
} else if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Produto</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <div class="container">
        <h2>Alterar Produto</h2>

        <?php if ($mensagem): ?>
            <p style="font-weight: bold; <?php echo $estilo_mensagem; ?>"><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="alterar_produto.php" method="POST">
            <input type="hidden" name="idprod" value="<?php echo $idprod; ?>">
            
            <ul>
                <li>Nome: <input type="text" name="produto" value="<?php echo htmlspecialchars($produto); ?>" required></li>
                
                <li>Preço: R$ <input type="number" step="0.01" name="preco" value="<?php echo $preco; ?>" required></li>
                
                <li>Quantidade: <input type="number" step="1" name="quantidade" value="<?php echo $quantidade; ?>" required></li>
            </ul>
            
            <button type="submit" name="botao_salvar">Salvar Alterações</button>
        </form>

        <br>
        <div class="btn-secondary">
             <a href="index.php"><button>Voltar</button></a>
        </div>
       
    </div>
</body>
</html>