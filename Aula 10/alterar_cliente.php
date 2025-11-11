<?php
require("conecta.php");

$idcli = 0;
$cliente = "";
$fone = "";
$mensagem = "";
$estilo_mensagem = "color: green;";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idcli'])) {
    
    // Processa a submissão do formulário (POST)
    $idcli_post = intval($_POST['idcli']);
    $cliente_post = $mysqli->real_escape_string($_POST['cliente']);
    $fone_post = $mysqli->real_escape_string($_POST['fone']); 

    $sql_update = "UPDATE clientes 
                   SET cliente = '{$cliente_post}', 
                       fone = '{$fone_post}' 
                   WHERE idcli = {$idcli_post}";

    if ($mysqli->query($sql_update)) {
        $mensagem = "Alteração realizada com sucesso!";
        $estilo_mensagem = "color: #28a745;"; // Verde
    } else {
        $mensagem = "Erro ao alterar: " . $mysqli->error;
        $estilo_mensagem = "color: #dc3545;"; // Vermelho
    }
    
    // Atualiza as variáveis para mostrar os novos dados no formulário
    $idcli = $idcli_post;
    $cliente = $cliente_post;
    $fone = $fone_post;

} 


// Busca os dados do cliente para preencher o formulário (GET ou após o POST)
$id_param = (isset($_GET["idcli"])) ? intval($_GET["idcli"]) : $idcli; 

if ($id_param > 0) {
    $busca = $mysqli->query("SELECT * FROM clientes WHERE idcli = $id_param") or die($mysqli->error);
    
    if ($busca->num_rows > 0) {
        $row = $busca->fetch_assoc();
        $idcli = $row['idcli'];
        $cliente = $row['cliente'];
        $fone = $row['fone'];
    } else {
        $mensagem = "Cliente não encontrado!";
        $estilo_mensagem = "color: #dc3545;";
    }
} else if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // Redireciona se não houver ID e não for um POST
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Cliente</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    
    <div class="container">
        <h2>Alterar Cliente</h2>

        <?php if ($mensagem): ?>
            <p style="font-weight: bold; <?php echo $estilo_mensagem; ?>"><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="alterar_cliente.php" method="POST">
            <input type="hidden" name="idcli" value="<?php echo $idcli; ?>">
            
            <ul>
                <li>Nome: <input type="text" name="cliente" value="<?php echo htmlspecialchars($cliente); ?>" required></li>
                
                <li>Telefone: <input type="text" name="fone" value="<?php echo htmlspecialchars($fone); ?>"></li>
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