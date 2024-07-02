<?php
include 'config.php';

// 1. Inserir um registro na tabela de produtos
$sql1 = "INSERT INTO produtos (cod_prod, loj_prod, desc_prod, dt_inclu_prod, preco_prod) 
VALUES (170, 2, 'LEITE CONDESADO MOCOCA', '2010-12-30', 45.40)";
$conn->query($sql1);

// 2. Alterar o preço do produto para R$95,40
$sql2 = "UPDATE produtos 
SET preco_prod = 95.40 
WHERE cod_prod = 170 AND loj_prod = 2";
$conn->query($sql2);

// 3. Selecionar todos os registros das lojas 1 e 2
$sql3 = "SELECT * FROM produtos WHERE loj_prod IN (1, 2)";
$resultado3 = $conn->query($sql3);

// 4. Selecionar a maior e a menor data de inclusão do produto
$sql4 = "SELECT MAX(dt_inclu_prod) AS MaiorData, MIN(dt_inclu_prod) AS MenorData FROM produtos";
$resultado4 = $conn->query($sql4);
$row4 = $resultado4->fetch_assoc();

// 5. Selecionar a quantidade total de registros na tabela de produtos
$sql5 = "SELECT COUNT(*) AS TotalRegistros FROM produtos";
$resultado5 = $conn->query($sql5);
$row5 = $resultado5->fetch_assoc();

// 6. Selecionar todos os produtos que começam com a letra “L”
$sql6 = "SELECT * FROM produtos WHERE desc_prod LIKE 'L%'";
$resultado6 = $conn->query($sql6);

// 7. Selecionar a soma de todos os preços dos produtos totalizados por loja
$sql7 = "SELECT loj_prod, SUM(preco_prod) AS TotalPrecos FROM produtos GROUP BY loj_prod";
$resultado7 = $conn->query($sql7);

// 8. Selecionar a soma de todos os preços dos produtos por loja onde o preço do produto é maior que R$100
$sql8 = "SELECT loj_prod, SUM(preco_prod) AS TotalPrecos FROM produtos WHERE preco_prod >= 100 GROUP BY loj_prod";
$resultado8 = $conn->query($sql8);

// A) Consultar os detalhes dos produtos na loja 1
$sqlA = "SELECT p.loj_prod, l.desc_loj, p.cod_prod, p.desc_prod, p.preco_prod, e.qtd_prod
        FROM produtos p
        JOIN lojas l ON p.loj_prod = l.loj_prod
        LEFT JOIN estoque e ON p.cod_prod = e.cod_prod AND p.loj_prod = e.loj_prod
        WHERE p.loj_prod = 1";
$resultadoA = $conn->query($sqlA);

// B) Produtos na tabela de produtos que não existem na tabela de estoque
$sqlB = "SELECT p.cod_prod, p.loj_prod, p.desc_prod, p.dt_inclu_prod, p.preco_prod
        FROM produtos p
        LEFT JOIN estoque e ON p.cod_prod = e.cod_prod AND p.loj_prod = e.loj_prod
        WHERE e.cod_prod IS NULL";
$resultadoB = $conn->query($sqlB);

// C) Produtos na tabela de estoque que não existem na tabela de produtos
$sqlC = "SELECT e.cod_prod, e.loj_prod, e.qtd_prod
        FROM estoque e
        LEFT JOIN produtos p ON e.cod_prod = p.cod_prod AND e.loj_prod = p.loj_prod
        WHERE p.cod_prod IS NULL";
$resultadoC = $conn->query($sqlC);

// Fechar conexão
$conn->close();
?>
