<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Domain\Product;
interface ProductValidator
{
    /**
     * @param string $name
     */
    public function validateName($name): array; 
   
    /**
     * @param Product $product
     */
    public function validateItem (Product $product): array;
   
}