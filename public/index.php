<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';
?>

<!doctype html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>SRP Demo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <style>
        body {
            font-family: system-ui, Segoe UI, Arial;
            margin: 2rem
        }

        label {
            display: block;
            margin: .5rem 0
        }

        button {
            background-color: blue;
        }
    </style>
</head>

<body>
    <h1>Cadastro de Produto (SRP)</h1>
    <form method="post" action="create.php">
        <label>Nome <input name="name" required></label>
        <label>Preço <input name="price" type="price" required></label>
        <button type="submit">Cadastrar</button>
    </form>
    <form action="list.php" method="get">
        <button type="submit">Listar Produtos</button>
    </form>