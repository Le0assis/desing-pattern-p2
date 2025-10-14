<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;

$file = __DIR__ . '/../storage/products.txt';
$repo = new FileProductRepository($file);

$products = [];

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $products[] = json_decode($line, true);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listagem de Produtos</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
            background: #f8f8f8;
        }

        h1 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #333;
            color: white;
        }

        .message {
            font-size: 1.1rem;
            color:
                <?= $color ?>;
            margin-bottom: 1rem;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            width: 400px;
        }

        a {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #007bff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.2s;
        }

        a:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <?php if (count($products) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars((string) ($product['id'] ?? '')) ?></td>
                    <td><?= htmlspecialchars($product['name'] ?? '') ?></td>
                    <td>R$ <?= number_format($product['price'] ?? 0, 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <div class="container">
            <p class="message">
                Nenhum produto encontrado. Cadastre um novo produto!
            </p>
        <?php endif; ?>
        <br>
        <a href="index.php">Voltar</a>
</body>

</html>