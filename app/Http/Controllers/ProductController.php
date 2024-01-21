<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::filter(request(['name', 'description', 'tags', 'price_from', 'price_to', 'categories']))->paginate(10);

        return ResponseFormatter::success(
            200,
            "Success Index Product",
            $products
        );
    }

    public function show(Product $product)
    {
        return ResponseFormatter::success(
            200,
            "Success Show Product",
            $product

        );
    }
}
