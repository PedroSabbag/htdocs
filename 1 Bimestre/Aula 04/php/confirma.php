<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <title>Confirmação do Pedido</title>
   <link rel="stylesheet" href="aula04.css">
</head>
<body>
<div class="container">
<?php
   // recebendo dados cliente
   $nome  = htmlspecialchars($_POST["nome"] ?? '');
   $cpf   = htmlspecialchars($_POST["cpf"] ?? '');
   $email = htmlspecialchars($_POST["email"] ?? '');
   $idade = htmlspecialchars($_POST["idade"] ?? '');

   // recebendo dados pedido
   $prod1  = $_POST["prod1"] ?? '';
   $preco1 = $_POST["preco1"] ?? 0;
   $qtd1   = $_POST["qtd1"] ?? 0;
   $prod2  = $_POST["prod2"] ?? '';
   $preco2 = $_POST["preco2"] ?? 0;
   $qtd2   = $_POST["qtd2"] ?? 0;
   $prod3  = $_POST["prod3"] ?? '';
   $preco3 = $_POST["preco3"] ?? 0;
   $qtd3   = $_POST["qtd3"] ?? 0;
   $prod4  = $_POST["prod4"] ?? '';
   $preco4 = $_POST["preco4"] ?? 0;
   $qtd4   = $_POST["qtd4"] ?? 0;
   $prod5  = $_POST["prod5"] ?? '';
   $preco5 = $_POST["preco5"] ?? 0;
   $qtd5   = $_POST["qtd5"] ?? 0;

   // recebendo dados endereço e frete
   $cep       = htmlspecialchars($_POST["cep"] ?? '');
   $endereco  = htmlspecialchars($_POST["endereco"] ?? '');
   $numero    = htmlspecialchars($_POST["numero"] ?? '');
   $cidade    = htmlspecialchars($_POST["cidade"] ?? '');
   $estado    = htmlspecialchars($_POST["estado"] ?? '');
   $frete_opcao = $_POST["frete"] ?? '';

   $nome_frete = "";
   $vfrete = 0;

   if($frete_opcao == 1) {
       $nome_frete = "Sedex";
       $vfrete = 50.00;
   } elseif($frete_opcao == 2) {
       $nome_frete = "PAC";
       $vfrete = 30.00;
   } elseif($frete_opcao == 3) {
       $nome_frete = "Retirada na Loja";
       $vfrete = 0;
   }

   echo "<div class='section'>";
   echo "<h2>Dados do Cliente</h2>";
   echo "<p><strong>CPF:</strong> $cpf</p>";
   echo "<p><strong>Nome:</strong> $nome</p>";
   echo "<p><strong>Email:</strong> $email</p>";
   echo "<p><strong>Data Nascimento:</strong> $idade</p>";
   echo "</div>";

   echo "<div class='section'>";
   echo "<h2>Dados do Pedido</h2>";
   if($prod1 != "Nenhum Produto"){
       echo "<p><strong>Produto:</strong> $prod1 <strong>Preço:</strong> R$ " . number_format($preco1, 2, ',', '.') . " <strong>Quantidade:</strong> $qtd1</p>";
   }
   if($prod2 != "Nenhum Produto"){
      echo "<p><strong>Produto:</strong> $prod2 <strong>Preço:</strong> R$ " . number_format($preco2, 2, ',', '.') . " <strong>Quantidade:</strong> $qtd2</p>";
   }
   if($prod3 != "Nenhum Produto"){
      echo "<p><strong>Produto:</strong> $prod3 <strong>Preço:</strong> R$ " . number_format($preco3, 2, ',', '.') . " <strong>Quantidade:</strong> $qtd3</p>";
   }
   if($prod4 != "Nenhum Produto"){
      echo "<p><strong>Produto:</strong> $prod4 <strong>Preço:</strong> R$ " . number_format($preco4, 2, ',', '.') . " <strong>Quantidade:</strong> $qtd4</p>";
   }
   if($prod5 != "Nenhum Produto"){
      echo "<p><strong>Produto:</strong> $prod5 <strong>Preço:</strong> R$ " . number_format($preco5, 2, ',', '.') . " <strong>Quantidade:</strong> $qtd5</p>";
   }

   $vtotal = (($preco1*$qtd1)+($preco2*$qtd2)+($preco3*$qtd3)+($preco4*$qtd4)+($preco5*$qtd5));
   echo "<p><strong>Valor Total da Compra:</strong> R$ " . number_format($vtotal,2,",",".") . "</p>";
   echo "</div>";

   echo "<div class='section'>";
   echo "<h2>Endereço de Entrega</h2>";
   echo "<p><strong>CEP:</strong> $cep</p>";
   echo "<p><strong>Endereço:</strong> $endereco</p>";
   echo "<p><strong>Número:</strong> $numero</p>";
   echo "<p><strong>Cidade/Estado:</strong> $cidade/$estado</p>";
   echo "<p><strong>Frete:</strong> $nome_frete (R$ " . number_format($vfrete, 2, ',', '.') . ")</p>";
   $vtotal_com_frete = $vtotal + $vfrete;
   echo "<p><strong>Valor Total com Frete:</strong> R$ " . number_format($vtotal_com_frete,2,",",".") . "</p>";

   echo "<h2>Forma de Pagamento</h2>";
   $fpagto = $_POST["fpagto"] ?? 0;
   $vpagar = $vtotal_com_frete;

   if ($fpagto == 1){
      $vpagar = $vtotal_com_frete - ($vtotal_com_frete * 0.1);
      echo "<p><strong>Boleto:</strong> 10% Desconto <br><strong>Valor a Pagar:</strong> R$ " . number_format($vpagar,2,",",".") . "</p>";
    }
    elseif ($fpagto == 2){
      $vpagar = $vtotal_com_frete / 6;
      echo "<p><strong>Cartão de Crédito:</strong> 6x S/Juros <br><strong>Valor da Parcela:</strong> R$ " . number_format($vpagar,2,",",".") . "</p>";
    }
    elseif ($fpagto == 3){
      $vpagar = ($vtotal_com_frete + ($vtotal_com_frete * 0.12))/12;
      echo "<p><strong>Cartão de Crédito:</strong> 12x C/Juros <br><strong>Valor da Parcela:</strong> R$ " . number_format($vpagar,2,",",".") . "</p>";
    }
    elseif ($fpagto == 4 ){
      $vpagar = $vtotal_com_frete - ($vtotal_com_frete * 0.15);
      echo "<p><strong>Pix:</strong> 15% Desconto <br><strong>Valor a Pagar:</strong> R$ " . number_format($vpagar,2,",",".") . "</p>";
    }
    else {
      echo "<p><strong>Cartão de Débito:</strong> <br><strong>Valor a Pagar:</strong> R$ " . number_format($vpagar,2,",",".") . "</p>";
    }
   echo "</div>";
?>
</div>
</body>
</html>