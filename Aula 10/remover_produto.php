<?php
require("conecta.php");

if (isset($_POST["idprod"])) {
    $id = intval($_POST["idprod"]);
    $delete = $mysqli->query("DELETE FROM produtos WHERE idprod = $id");

    if (!$delete) {
        die("Erro ao remover produto: " . $mysqli->error);
    }
}

header("Location: index.php");
exit;
?>
