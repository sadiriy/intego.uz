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

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'nullable|numeric|exists:products,id',
            'slug' => 'required|string|min:5|max:255',
            'name_ru' => 'required|string|min:5|max:255',
            'description_ru' => 'nullable|string|min:3|max:1024',
            'image' => 'mimes:jpg,png',
            'price' => 'required',
            'category' => 'required|numeric|exists:categories,id',
        ]);

        if ($request['image']){
            $imageName = 'img/products/' . time() . '.' . $request['image']->extension();
            $request['image']->move(public_path('img/products/'), $imageName);
        }

        try {
            $product = $request['id'] ? Product::find($request['id']) : new Product();
            $product->slug = $data['slug'];
            $product->name_ru = $data['name_ru'];
            $product->description_ru = $data['description_ru'];
            $product->image = $imageName ?? $product->image ?? '';
            $product->price = $data['price'];
            $product->category_id = $data['category'];
            $product->is_popular = (bool)$request['is_popular'];
            $product->save();
        }
        catch (\Exception $e){
            return back()->with('error', $e);
        }


        return redirect()->route('products.index')->with('success_message', $request['id'] ? 'Товар успешно изменен.' : 'Товар успешно создан.');

    }

    public function duplicate(Product $product){
        if ($product){
            $dup_product = new Product();
            $dup_product->slug = $product->slug . '_copy';
            $dup_product->name_ru = $product->name_ru . ' копия';
            $dup_product->description_ru = $product->description_ru;
            $dup_product->image = $product->image;
            $dup_product->price = $product->price;
            $dup_product->category_id = $product->category_id;
            $dup_product->is_popular = $product->is_popular;
            $dup_product->save();
        }
        return redirect()->route('products.index', $product);
    }

    public function destroy(Product $product)
    {
        Parameter::where('product_id', $product->id)->delete();
        $product->delete();
        return redirect()->route('products.index');
    }
}
