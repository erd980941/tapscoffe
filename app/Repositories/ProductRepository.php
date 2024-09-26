<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
    public function getAllProducts()
    {
        return $this->model->all();
    }

    public function findProductById($id)
    {
        return $this->model->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->model->create($data);
    }

    public function updateProduct($id, array $data)
    {
        $order = $this->findProductById($id);
        return $order->update($data);
    }

    public function deleteProduct($id)
    {
        return $this->findProductById($id)->delete();
    }
}
