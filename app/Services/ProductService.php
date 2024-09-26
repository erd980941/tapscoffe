<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\DTO\CreateProductDTO;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


}
