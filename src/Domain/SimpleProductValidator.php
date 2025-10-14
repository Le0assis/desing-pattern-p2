<?php

declare(strict_types=1);

namespace App\Domain;

use App\Contracts\ProductValidator;
use App\Domain\Product;
final class SimpleProductValidator implements ProductValidator
{
    public function validateName($name): array
    {
        $errors = [];

        if (strlen($name) > 100) {
            $errors[] = "Nome muito longo";
        }
        if ($name == null || strlen($name) <= 1) {
            $errors[] = "Nome incompleto";
        }
        return $errors;
    }

    public function validatePrice(float $price): array
    {
        $errors = [];

        if ($price < 0) {
            $errors[] = "Preço inválido";
        }
        return $errors;
    }

    public function validateItem(Product $product): array
    {
        $errors = [];
        $errors = array_merge($errors, $this->validateName($product->name));
        $errors = array_merge($errors, $this->validatePrice($product->price));

        return $errors;
    }
}