<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Enums\ProductStatus;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $products = Product::with('category')
            ->where('status', ProductStatus::PUBLISHED)
            ->where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('shop.index', compact('products'));
    }
}
