<?php
$cliente = $_POST["cliente"];
$fone = $_POST["fone"];

require("conecta.php");

$cliente_safe = $mysqli->real_escape_string($cliente);
$fone_safe = $mysqli->real_escape_string($fone);

$query = "INSERT INTO clientes (cliente, fone) VALUES ('$cliente_safe', '$fone_safe')";
$mysqli->query($query);

if ($mysqli->error) {
    echo "Erro ao cadastrar cliente: " . $mysqli->error;
} else {
    header("Location: index.php");
    exit;
}
?>