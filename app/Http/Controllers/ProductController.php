<?php

namespace App\Http\Controllers;
use App\Enums\ProductStatus;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductDestroyRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ProductController extends Controller
{
    use AuthorizesRequests;
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {   $products = $this->productService->getProductsPaginated();
        return view('products.index', compact('products'));
    }

    public function create(ProductCreateRequest $request)
    {

        $categories = Category::orderBy('name')->get();
        $statuses = ProductStatus::cases();
        return view('products.create', compact('categories', 'statuses'));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());
        return redirect()->route('products.show', $product)->with('ok','created');
    }

    public function show(Product $product)
    {
        $this->authorize('view', $product);
        $productWithCategory = $this->productService->loadProductCategory($product);
        return view('products.show', ['product' => $productWithCategory]);
    }

    public function edit(Product $product,ProductEditRequest $request)
    {
        $categories = Category::orderBy('name')->get();
        $statuses = ProductStatus::cases();
        return view('products.edit', compact('product','categories', 'statuses'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {

        $this->productService->updateProduct($product, $request->validated());
        return redirect()->route('products.show', $product)->with('ok','updated');
    }

    public function destroy(Product $product,ProductDestroyRequest $request)
    {
        $this->productService->deleteProduct($product);
        return redirect()->route('products.index')->with('ok', 'deleted');
    }
}
