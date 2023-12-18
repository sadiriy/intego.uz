<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product){
        $path = "/../../../../resources/pages/descriptions/";
        $product = Product::where('id', $product->id)->firstOrFail();
        $recommended_products = (new Product)->getRecommendedProducts(4, $product);
        if (file_exists(__DIR__  . $path . $product->id . '.html')) $product_description = file_get_contents( __DIR__ . $path . $product->id . '.html');
        else $product_description = "";

        return view('front/product')->with([
            'product' => $product,
            'recommended_products' => $recommended_products,
            'product_description' => $product_description,
        ]);
    }
}
