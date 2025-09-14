<?php

namespace App\Services;

use Illuminate\Support\Facades\Pipeline;
use App\Models\Product;
use App\Pipelines\ProductPipeline;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function createProduct(array $data): Product
    {
        return Pipeline::send($data)
            ->through((new ProductPipeline())->pipes())
            ->via('__invoke')
            ->then(function ($processedData) {
                return Product::create($processedData);
            });
    }
    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }

    public function updateProduct(Product $product, array $data): Product
    {
        Pipeline::send($data)
            ->through((new ProductPipeline())->pipes())
            ->via('__invoke')
            ->then(function ($processedData) use ($product) {
                $product->update($processedData);
            });

        return $product;
    }
    public function edit(Product $product, array $data): Product
    {
        $data['slug'] = Str::slug($data['title']);
        $product->update($data);
        return $product;
    }
    public function store(array $data): Product
    {
        $data['slug'] = Str::slug($data['title']);
        return Product::create($data);
    }
    public function getProductsPaginated(): LengthAwarePaginator
    {

        return Product::with('category')->latest()->paginate(10);
    }
    public function loadProductCategory(Product $product): Product
    {
        if (!$product->relationLoaded('category')) {

            $product->load('category');
        }

        return $product;
    }
}
