<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Domain\SimpleProductValidator;
use App\Infra\FileProductRepository;

$file = __DIR__ . '/../storage/products.txt';
$service = new ProductService(
    repo: new FileProductRepository($file),
    validator: new SimpleProductValidator()
);

$name = $_POST['name'] ?? '';
$price = (float) ($_POST['price'] ?? 0);

$result = $service->register(
    name: $name,
    price: $price
);

if ($result['success']) {
    http_response_code(201);
    $message = $result['message'];
    $color = 'green';
} else {
    http_response_code(422);
    $errors = $result['errors'];
    $message = implode('<br>', $errors);
    $color = 'red';

}
?>


<!DOCTYPE html>
</body>

</html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f3f3f3;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
            width: 400px;
        }

        .message {
            font-size: 1.1rem;
            color:
                <?= $color ?>
            ;
            margin-bottom: 1rem;
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
    <div class="container">
        <p class="message">
            <?php
            if (is_array($message)) {
                echo implode('<br>', $message);
            } else {
                echo $message;
            }
            ?>
        </p>
        <a href="index.php">Voltar</a>
    </div>
</body>

</html>