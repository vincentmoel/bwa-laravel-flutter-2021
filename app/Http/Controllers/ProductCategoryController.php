<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::filter(request(['name']))->paginate(request()->limit);

        return ResponseFormatter::success(
            200,
            "Success Index Category",
            $categories

        );
    }

    public function show(ProductCategory $category)
    {
        return ResponseFormatter::success(
            200,
            "Success Show Category",
            $category->with('products')

        );
    }
}
