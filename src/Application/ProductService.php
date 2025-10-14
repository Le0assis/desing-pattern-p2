<?php

namespace App\Application;

use App\Domain\Product;
use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;


final class ProductService 
{   
    /**
     * @param ProductRepository $repo
     * @param ProductValidator $validator
     */
    public function __construct(
        private ProductRepository $repo,
        private ProductValidator $validator
    ) {
    }

    /**
     * @param string $name 
     * @param float $price
     */
    public function register (string $name, float $price) 
    {   
        $id = $this->repo->getId();
        $product = new Product($id,$name, $price);
        $errors = $this->validator->validateItem($product);

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        $this->repo->save($product);
            return [
                'success' => true,
                'message' => 'Produto cadastrado com sucesso'
            ];
        }
    
}
