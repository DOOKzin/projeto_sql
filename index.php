<?php
include 'controller.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados das Consultas</title>
</head>
<body>
    <h1>Resultados das Consultas SQL</h1>

    <h2>3. Todos os registros das lojas 1 e 2</h2>
    <table border="1">
        <tr>
            <th>cod_prod</th>
            <th>loj_prod</th>
            <th>desc_prod</th>
            <th>dt_inclu_prod</th>
            <th>preco_prod</th>
        </tr>
        <?php while($row3 = $resultado3->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row3['cod_prod']; ?></td>
            <td><?php echo $row3['loj_prod']; ?></td>
            <td><?php echo $row3['desc_prod']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($row3['dt_inclu_prod'])); ?></td>
            <td><?php echo $row3['preco_prod']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>4. Maior e menor data de inclusão do produto</h2>
    <p>Maior Data: <?php echo date('d-m-Y', strtotime($row4['MaiorData'])); ?></p>
    <p>Maior Data: <?php echo date('d-m-Y', strtotime($row4['MenorData'])); ?></p>

    <h2>5. Quantidade total de registros na tabela de produtos</h2>
    <p>Total de Registros: <?php echo $row5['TotalRegistros']; ?></p>

    <h2>6. Produtos que começam com a letra "L"</h2>
    <table border="1">
        <tr>
            <th>cod_prod</th>
            <th>loj_prod</th>
            <th>desc_prod</th>
            <th>dt_inclu_prod</th>
            <th>preco_prod</th>
        </tr>
        <?php while($row6 = $resultado6->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row6['cod_prod']; ?></td>
            <td><?php echo $row6['loj_prod']; ?></td>
            <td><?php echo $row6['desc_prod']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($row6['dt_inclu_prod'])); ?></td>
            <td><?php echo $row6['preco_prod']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>7. Soma dos preços dos produtos totalizados por loja</h2>
    <table border="1">
        <tr>
            <th>loj_prod</th>
            <th>TotalPrecos</th>
        </tr>
        <?php while($row7 = $resultado7->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row7['loj_prod']; ?></td>
            <td><?php echo $row7['TotalPrecos']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>8. Soma dos preços dos produtos totalizados por loja com total maior que R$100.000</h2>
    <table border="1">
        <tr>
            <th>loj_prod</th>
            <th>TotalPrecos</th>
        </tr>
        <?php while($row8 = $resultado8->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row8['loj_prod']; ?></td>
            <td><?php echo $row8['TotalPrecos']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>A) Detalhes dos Produtos na Loja 1</h2>
    <table border="1">
        <tr>
            <th>Código da Loja</th>
            <th>Descrição da Loja</th>
            <th>Código do Produto</th>
            <th>Descrição do Produto</th>
            <th>Preço do Produto</th>
            <th>Quantidade em Estoque</th>
        </tr>
        <?php while($rowA = $resultadoA->fetch_assoc()): ?>
        <tr>
            <td><?php echo $rowA['loj_prod']; ?></td>
            <td><?php echo $rowA['desc_loj']; ?></td>
            <td><?php echo $rowA['cod_prod']; ?></td>
            <td><?php echo $rowA['desc_prod']; ?></td>
            <td><?php echo $rowA['preco_prod']; ?></td>
            <td><?php echo $rowA['qtd_prod']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>B) Produtos na Tabela de Produtos que Não Existem na Tabela de Estoque</h2>
    <table border="1">
        <tr>
            <th>Código do Produto</th>
            <th>Código da Loja</th>
            <th>Descrição do Produto</th>
            <th>Data de Inclusão</th>
            <th>Preço do Produto</th>
        </tr>
        <?php while($rowB = $resultadoB->fetch_assoc()): ?>
        <tr>
            <td><?php echo $rowB['cod_prod']; ?></td>
            <td><?php echo $rowB['loj_prod']; ?></td>
            <td><?php echo $rowB['desc_prod']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($rowB['dt_inclu_prod'])); ?></td>
            <td><?php echo $rowB['preco_prod']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>C) Produtos na Tabela de Estoque que Não Existem na Tabela de Produtos</h2>
    <table border="1">
        <tr>
            <th>Código do Produto</th>
            <th>Código da Loja</th>
            <th>Quantidade em Estoque</th>
        </tr>
        <?php while($rowC = $resultadoC->fetch_assoc()): ?>
        <tr>
            <td><?php echo $rowC['cod_prod']; ?></td>
            <td><?php echo $rowC['loj_prod']; ?></td>
            <td><?php echo $rowC['qtd_prod']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
