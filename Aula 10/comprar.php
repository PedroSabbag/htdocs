<?php
require("conecta.php");

if (isset($_POST["idprod"]) && isset($_POST["quantidade"])) {
    $idprod = intval($_POST["idprod"]);
    $quantidade = intval($_POST["quantidade"]);
    
    $busca_estoque = $mysqli->query("SELECT quantidade, produto, preco FROM produtos WHERE idprod = $idprod");
    
    if ($busca_estoque && $busca_estoque->num_rows > 0) {
        $dados = $busca_estoque->fetch_assoc();
        $estoque_disponivel = $dados["quantidade"];
        $nome = $mysqli->real_escape_string($dados["produto"]); 
        $preco = $dados["preco"];

        if ($quantidade > 0 && $quantidade <= $estoque_disponivel) {
            
            $existe = $mysqli->query("SELECT * FROM compras WHERE produto = '$nome'");

            if ($existe && $existe->num_rows > 0) {
                $atualiza = $mysqli->query("UPDATE compras SET quantidade = quantidade + $quantidade WHERE produto = '$nome'");
                if (!$atualiza) {
                    die("Erro ao atualizar: " . $mysqli->error);
                }
            } else {
                $insere = $mysqli->query("INSERT INTO compras (produto, preco, quantidade) VALUES ('$nome', '$preco', $quantidade)");
                if (!$insere) {
                    die("Erro ao inserir: " . $mysqli->error);
                }
            }
            
            // ATUALIZA O ESTOQUE APÓS ADICIONAR AO CARRINHO
            $mysqli->query("UPDATE produtos SET quantidade = quantidade - $quantidade WHERE idprod = $idprod");

        } else if ($quantidade > $estoque_disponivel) {
             // Caso a quantidade seja maior que o estoque, você pode adicionar uma mensagem de erro aqui
        }
    } else {
        die("Produto não encontrado!");
    }
}

header("Location: index.php");
exit;
?>