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
        try {
            $product = $this->model->create($data);
            return [
                'success' => true,
                'message' => 'Product added successfully',
                'data' => $product
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while add the product',
                'error' => $e->getMessage()
            ];
        }
    }

    public function updateProduct($id, array $data)
    {
        try {
            $product = $this->findProductById($id);
            if (!$product) {
                return [
                    'success' => false,
                    'message' => 'Ürün bulunamadı.'
                ];
            }
            $product->update($data);

            return [
                'success' => true,
                'message' => 'Product updated successfully',
                'data' => $product
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while updating the product',
                'error' => $e->getMessage()
            ];
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = $this->findProductById($id)->delete();
            $product->delete();

            return [
                'success' => true,
                'message' => 'Product deleted successfully'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'An error occurred while deleting the product',
                'error' => $e->getMessage()
            ];
        }
    }
}
