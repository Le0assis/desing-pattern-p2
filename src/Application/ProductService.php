<?php

namespace App\Application;

use App\Domain\Product;
use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;


final class ProductService 
{
    public function __construct(
        private ProductRepository $repo,
        private ProductValidator $validator
    ) {
    }

    public function register (string $name, float $price) 
    {   



        $id = $this->repo->getId();

        $product = new Product($id,$name, $price);
        $errors = $this->validator->validateItem($product);

        if ($errors != []) {
            return false;
        }

        $this->repo->save($product);
        return true;
    }
    
}