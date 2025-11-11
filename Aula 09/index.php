<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Supermercado Encontrei</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="container">

    <div class="header">
        <img src="images.jpg" alt="Logo Supermercado">
        <div>
            <h1>! Supermercado Encontrei !</h1>
            <h4>Aqui temos os melhores produtos com os melhores preços, segue a lista</h4>
        </div>
    </div>
    
    <?php
        require("conecta.php"); // Mantém a conexão no início
    ?>

    <br/>
    <hr/>
    <br/>

    <h2>Cadastrar Clientes</h2>

    <form action="cadastro_cliente.php" method="POST">
        <ul>
            <li>Nome do Cliente: <input type="text" name="cliente" size="30" maxlength="80" required></li>
            <li>Telefone (Opcional): <input type="text" name="fone" size="20" maxlength="20"></li>
        </ul>
        <button type="submit">Adicionar Cliente</button>
    </form>

    <br/>

    <h2>CLIENTES CADASTRADOS</h2>

    <table cellspacing="0" cellpadding="5">
        <tr align="center">
            <th>Id</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Remover</th>
        </tr>

        <?php 
            $mostrar_clientes = $mysqli->query("SELECT * FROM clientes") or die($mysqli->error);
            if ($mostrar_clientes->num_rows > 0) {
                while ($row_cli = $mostrar_clientes->fetch_assoc()) {
                    echo "
                        <tr align='center'>
                            <td>{$row_cli['idcli']}</td>
                            <td>".htmlspecialchars($row_cli['cliente'])."</td>
                            <td>".htmlspecialchars($row_cli['fone'])."</td>
                            <td class='table-remove'>
                                <form action='remover_cliente.php' method='POST'>
                                    <input type='hidden' name='idcli' value='{$row_cli['idcli']}'>
                                    <button type='submit' onclick=\"return confirm('Tem certeza que deseja remover este cliente?')\">Remover</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
            } else {
                echo "<tr align='center'><td colspan='4'>Nenhum Cliente Registrado</td></tr>";
            }
        ?>
    </table>
    
    <br/>
    <hr/>
    <br/>
    <h2>Cadastrar Produtos</h2>

    <form action="cadastro.php" method="POST">
        <ul>
            <li>Nome: <input type="text" name="produto" size="20" maxlength="50" required></li>
            <li>Valor: R$ <input type="number" name="preco" step="0.01" required></li>
            <li>Quantidade Estoque: <input type="number" name="quantidade" step="1" required></li>
        </ul>
        <button type="submit">Adicionar Produto</button>
    </form>

    <br/>

    <h2>PRODUTOS</h2>

    <table cellspacing="0" cellpadding="5">
        <tr align="center">
            <th>Id</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Quantidade</th>
            <th>Alterar</th>
            <th>Remover</th>
        </tr>

        <?php 
            $mostrar = $mysqli->query("SELECT * FROM produtos") or die($mysqli->error);
            if ($mostrar->num_rows > 0) {
                while ($row = $mostrar->fetch_assoc()) {
                    echo "
                        <tr align='center'>
                            <td>{$row['idprod']}</td>
                            <td>".htmlspecialchars($row['produto'])."</td>
                            <td>R$ ".number_format($row['preco'], 2, ',', '.')."</td>
                            <td>{$row['quantidade']}</td>
                            <td>
                                <form action='comprar.php' method='POST' style='display:flex; align-items:center; justify-content:center; gap: 5px;'>
                                    <input type='hidden' name='idprod' value='{$row['idprod']}'>
                                    <input type='number' name='quantidade' value='1' min='1' max='{$row['quantidade']}' style='width: 60px; text-align: center;' required>
                                    <button type='submit'>Confirmar</button>
                                </form>
                            </td>
                            <td>
                                <form action='alterar_produto.php' method='GET'>
                                    <input type='hidden' name='idprod' value='{$row['idprod']}'>
                                    <button type='submit'>Alterar</button>
                                </form>
                            </td>
                            <td class='table-remove'>
                                <form action='remover_produto.php' method='POST'>
                                    <input type='hidden' name='idprod' value='{$row['idprod']}'>
                                    <button type='submit' onclick=\"return confirm('Tem certeza que deseja remover este produto?')\">Remover</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }
            } else {
                echo "<tr align='center'><td colspan='7'>Nenhum Produto Registrado</td></tr>";
            }
        ?>
    </table>

    <br/>

    <h2>CARRINHO DE COMPRAS</h2>

    <table cellspacing="0" cellpadding="5">
        <tr align="center">
            <th>Id</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Remover</th>
        </tr>

        <?php 
            $total = 0;
            $compra = $mysqli->query("SELECT * FROM compras") or die($mysqli->error);
            $itens_carrinho = [];

            if ($compra->num_rows > 0) {
                while ($row = $compra->fetch_assoc()) {
                    $subtotal = $row['preco'] * $row['quantidade'];
                    $total += $subtotal;
                    $itens_carrinho[] = $row; 

                    echo "
                        <tr align='center'>
                            <td>{$row['idcompra']}</td>
                            <td>".htmlspecialchars($row['produto'])."</td>
                            <td>R$ ".number_format($row['preco'], 2, ',', '.')."</td>
                            <td>{$row['quantidade']}</td>
                            <td class='table-remove'>
                                <form action='remover_compras.php' method='POST'>
                                    <input type='hidden' name='idcompra' value='{$row['idcompra']}'>
                                    <button type='submit'>Remover</button>
                                </form>
                            </td>
                        </tr>
                    ";
                }

                echo "<tr align='center'><td colspan='5'><strong>Total a pagar: R$ ".number_format($total, 2, ',', '.')."</strong></td></tr>";
            } else {
                echo "<tr align='center'><td colspan='5'>Nenhum Produto no Carrinho</td></tr>";
            }
        ?>
    </table>

    <br/>
    
    <h2>Confirmar Venda</h2>

    <div class="venda-area">
        <form action="vender.php" method="POST">
            <?php
                $contador = 0;
                
                foreach ($itens_carrinho as $item) {
                    echo "
                        <input type='hidden' name='idcompra_".$contador."' value='".$item['idcompra']."'>
                        <input type='hidden' name='produto_".$contador."' value='".htmlspecialchars($item['produto'])."'>
                        <input type='hidden' name='preco_".$contador."' value='".$item['preco']."'>
                        <input type='hidden' name='quantidade_".$contador."' value='".$item['quantidade']."'>
                    ";
                    $contador++;
                }
                
                echo "<input type='hidden' name='contador' value='".$contador."'>";
            ?>
            <button type="submit" <?php echo (empty($itens_carrinho)) ? 'disabled' : ''; ?>>Confirmar Compra</button>
            <?php if (empty($itens_carrinho)): ?>
                <p style="color: #dc3545;">(Sem Produtos !!!)</p>
            <?php endif; ?>
        </form>
    </div>

</div> 
</body>
</html>