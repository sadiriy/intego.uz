<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Parameter;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = (new Category)->getAllCategories();
        $products = Product::orderBy('id', 'DESC')->paginate(15);

        return view('back/products')->with([
            'showPagination' => 1,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request){
        $searchResults = Product::where('name_ru', 'LIKE', "%$request->search%")->get();
        $categories = (new Category)->getAllCategories();

        return view('back/products')->with([
            'showPagination' => 0,
            'products' => $searchResults,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $id = $request['id'];
        $name_ru = $request['name_ru'];
        $description_ru = $request['description_ru'];
        $category_id = $request['category'];

        if ($id == null) {
            Product::create([
                'name_ru' => $name_ru,
                'description_ru' => $description_ru,
                'category_id' => $category_id,
            ]);
            return redirect()->route('products.index');
        }//I know there shouldn't be 'else', but I like it this way.
        else{
            Product::where('id', $id)->update([
                'name_ru' => $name_ru,
                'description_ru' => $description_ru,
                'category_id' => $category_id,
            ]);
            return redirect()->route('products.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function duplicate(Product $product){
        Product::create([
            'name_ru' => $product->name_ru,
            'name_en' => $product->name_en,
            'name_uz' => $product->name_uz,
            'name_tr' => $product->name_tr,
            'name_ar' => $product->name_ar,
            'description_ru' => $product->description_ru,
            'description_en' => $product->description_en,
            'description_uz' => $product->description_uz,
            'description_tr' => $product->description_tr,
            'description_ar' => $product->description_ar,
            'category_id' => $product->category_id,
        ]);
        return redirect()->route('products.index', $product);
    }

    public function destroy(Product $product)
    {
        Parameter::where('product_id', $product->id)->delete();
        $product->delete();
        return redirect()->route('products.index');
    }
}
