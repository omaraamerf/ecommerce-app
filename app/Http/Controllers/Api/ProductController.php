<?php

namespace App\Http\Controllers\Api;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(\App\Services\ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->where('status', ProductStatus::PUBLISHED)
            ->latest()
            ->paginate(10);


        return new \App\Http\Resources\ProductCollection($products);
    }


    public function show(Product $product)
    {

        $product->load('category');


        return new ProductResource($product);
    }
    public function store(ApiProductStoreRequest $request)
    {

        $product = $this->productService->createProduct($request->validated());


        return (new ProductResource($product))->response()->setStatusCode(201);
    }
}
