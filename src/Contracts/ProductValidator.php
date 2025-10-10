<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Domain\Product;
final class ProductValidator
{
    public function validateName($name): array 
    {
        $errors = [];

        if (strlen($name) > 100 ) {
            $errors = "Nome muito longo";
        }
        if ($name == null || strlen($name) < 0) {
            $errors = "Nome incompleto";
        }
        return $errors;
    }

    public function validatePrice (float $price) : array 
    {
        $errors = [];

        if ($price < 0) {
            $errors = "Preço inválido"; 
        }
        return $errors;
    }

    public function validateItem (Product $product)
    {
        $errors = [];
        $errors = $this->validateName($product->name);
        $errors = $this->validatePrice($product->price);
        
        return $errors;
    }
}