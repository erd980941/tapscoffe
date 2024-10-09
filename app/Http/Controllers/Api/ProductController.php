<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = $this->productService->findProductById($id);
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $product = $this->productService->createProduct($request->all());
        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($id, $request->all());
        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $response = $this->productService->deleteProduct($id);
        return response()->json($response);
    }
}
