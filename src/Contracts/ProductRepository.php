<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Domain\Product;

interface ProductRepository
{
    /**
     * @param class{Product product} 
     */
    public function save(Product $product): void;

    public function getAll();
    
    public function getId(): int;
}