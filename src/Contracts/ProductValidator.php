<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Domain\Product;
interface ProductValidator
{
    public function validateName($name): array; 
   
    public function validateItem (Product $product): array;
   
}