<?php

declare(strict_types=1);
namespace App\Infra;

use App\Contracts\ProductRepository;
use App\Domain\Product;

final class FileProductRepository implements ProductRepository
{
    public function __construct(private string $filePath)
    {

        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }
    public function getAll(): array
    {
        $products = [];

        foreach (file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $decoded = json_decode($line, true);
            if (is_array($decoded)) {
                $products[] = $decoded;
            }
        }

        return $products;
    }
    public function getId(): int
    {
        
        $products = $this->getAll();

        if (empty($products)) {
            return 1;
        }

        $last = end($products);
        return ($last['id'] ?? 0) + 1;
    }

    /** @param */
    public function save(Product $product): void
    {

        $data = $product->toArray();
        file_put_contents($this->filePath, json_encode(
            $data,
            JSON_UNESCAPED_UNICODE
        ) . PHP_EOL, FILE_APPEND);


    }
}