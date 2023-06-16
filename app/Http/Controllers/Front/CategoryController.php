<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category){
        $products = (new Product)->getCategoryProducts($category);
        return view('front/products')->with([
            'products' => $products
        ]);
    }
}
