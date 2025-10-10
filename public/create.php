<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Contracts\ProductValidator;
use App\Domain\Product;
use App\Infra\FileProductRepository;

$file = __DIR__ . '/../storage/products.txt';
$service = new ProductService(
    repo: new FileProductRepository($file),
    validator: new ProductValidator()
);

// Usar fallback para evitar undefined keys
$name = $_POST['name'] ?? '';
$price = (float) ($_POST['price'] ?? 0);

// Chama o serviço usando as variáveis seguras
$ok = $service->register(
    name: $name,
    price: $price
);

http_response_code($ok ? 201 : 422);
echo $ok ? 'Produto cadastrado com sucesso' : 'Falha na validação';
