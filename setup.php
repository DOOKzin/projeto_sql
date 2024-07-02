<?php
include 'config.php';

// Criar tabela de produtos
$sql_create_produtos = "
CREATE TABLE IF NOT EXISTS produtos (
    cod_prod INT(8) NOT NULL,
    loj_prod INT(8) NOT NULL,
    desc_prod CHAR(40),
    dt_inclu_prod DATE,
    preco_prod DECIMAL(10, 2),
    PRIMARY KEY (cod_prod, loj_prod)
)";
$conn->query($sql_create_produtos);

// Inserir dados fictícios na tabela de produtos
$sql_insert_produtos = "
INSERT INTO produtos (cod_prod, loj_prod, desc_prod, dt_inclu_prod, preco_prod) VALUES
(1, 1, 'PRODUTO A', '2024-01-01', 100.00),
(2, 1, 'PRODUTO B', '2024-01-02', 150.00),
(4, 2, 'LEITE CONDENSADO', '2024-01-04', 250.00),
(5, 1, 'LARANJA', '2024-01-05', 300.00)";
$conn->query($sql_insert_produtos);

// Criar tabela de estoque
$sql_create_estoque = "
CREATE TABLE IF NOT EXISTS estoque (
    cod_prod INT(8) NOT NULL,
    loj_prod INT(8) NOT NULL,
    qtd_prod DECIMAL(10, 2),
    PRIMARY KEY (cod_prod, loj_prod)
)";
$conn->query($sql_create_estoque);

// Inserir dados fictícios na tabela de estoque
$sql_insert_estoque = "
INSERT INTO estoque (cod_prod, loj_prod, qtd_prod) VALUES
(1, 1, 10),
(2, 1, 20),
(3, 2, 30),
(5, 1, 40)";
$conn->query($sql_insert_estoque);

// Criar tabela de lojas
$sql_create_lojas = "
CREATE TABLE IF NOT EXISTS lojas (
    loj_prod INT(8) NOT NULL,
    desc_loj CHAR(40),
    PRIMARY KEY (loj_prod)
)";
$conn->query($sql_create_lojas);

// Inserir dados fictícios na tabela de lojas
$sql_insert_lojas = "
INSERT INTO lojas (loj_prod, desc_loj) VALUES
(1, 'LOJA 1'),
(2, 'LOJA 2')";
$conn->query($sql_insert_lojas);

// Fechar conexão
$conn->close();

echo "Tabelas criadas com sucesso!!";
?>
