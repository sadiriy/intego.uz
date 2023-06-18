<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('back/categories')->with([
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_ru' => 'required|string|min:5|max:255',
            'image' => 'mimes:jpg,png',
            'position' => 'required|numeric|gte:0'
        ]);

        if ($request['image']){
            $imageName = 'img/categories/' . time() . '.' . $request['image']->extension();
            $request['image']->move(public_path('img/categories/'), $imageName);
        }

        if (!$request['id']) {
            $category = new Category();
        }
        else{
            $category = Category::find($request['id']);
        }

        $category->name_ru = $data['name_ru'];
        $category->description_ru = $request['description_ru'];
        $category->image = $imageName ?? $category->image ?? '';
        $category->position = $data['position'];
        $category->is_popular = (bool)$request['is_popular'];
        $category->save();
        return redirect()->route('categories.index');

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success_message', 'Опрос ' . $category->name . ' успешно удален.');
    }
}
