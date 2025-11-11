<?php
$produto = $_POST["produto"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];

require("conecta.php");

$mysqli->query("INSERT INTO produtos (produto, preco, quantidade) VALUES ('$produto', '$preco', '$quantidade')");

if ($mysqli->error) {
    echo "Erro ao cadastrar: " . $mysqli->error;
} else {
    header("Location: index.php");
    exit;
}
?>
