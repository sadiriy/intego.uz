<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category_id){
        $products = Product::with('parameters', 'parameters.attributes')->where('category_id', $category_id)->get();
        $category = Category::where('id', $category_id)->firstOrFail();
        $attributes = Attributes::where('category_id', $category_id)->get();


        return view('front/products')->with([
            'products' => $products,
            'category' => $category,
            'attributes' => $attributes,
        ]);
    }
}
