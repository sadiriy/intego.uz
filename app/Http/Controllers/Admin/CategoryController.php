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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $id = $request['id'];
        $name_ru = $request['name_ru'];
        $name_en = $request['name_en'];
        $name_uz = $request['name_uz'];
        $name_tr = $request['name_tr'];
        $name_ar = $request['name_ar'];
        $image = $request['image'];
        $imageName = null;
        $description_ru = $request['description_ru'];
        $description_en = $request['description_en'];
        $description_uz = $request['description_uz'];
        $description_tr = $request['description_tr'];
        $description_ar = $request['description_ar'];
        $text_ru = $request['text_ru'];
        $text_en = $request['text_en'];
        $text_uz = $request['text_uz'];
        $text_tr = $request['text_tr'];
        $text_ar = $request['text_ar'];
        $position = $request['position'];

        if ($image != null){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img/categories/'), $imageName);
        }
        if ($id == null) {
            Category::create([
                'name_ru' => $name_ru,
                'name_en' => $name_en,
                'name_uz' => $name_uz,
                'name_tr' => $name_tr,
                'name_ar' => $name_ar,
                'image' => $imageName,
                'description_ru' => $description_ru,
                'description_en' => $description_en,
                'description_uz' => $description_uz,
                'description_tr' => $description_tr,
                'description_ar' => $description_ar,
                'text_ru' => $text_ru,
                'text_en' => $text_en,
                'text_uz' => $text_uz,
                'text_tr' => $text_tr,
                'text_ar' => $text_ar,
                'position' => $position,
            ]);
            return redirect()->route('categories.index');
        }
        elseif ($id != null && $image != null) {
            Category::where('id', $id)->update([
                'name_ru' => $name_ru,
                'name_en' => $name_en,
                'name_uz' => $name_uz,
                'name_tr' => $name_tr,
                'name_ar' => $name_ar,
                'image' => $imageName,
                'description_ru' => $description_ru,
                'description_en' => $description_en,
                'description_uz' => $description_uz,
                'description_tr' => $description_tr,
                'description_ar' => $description_ar,
                'text_ru' => $text_ru,
                'text_en' => $text_en,
                'text_uz' => $text_uz,
                'text_tr' => $text_tr,
                'text_ar' => $text_ar,
                'position' => $position,
                ]);
            return redirect()->route('categories.index');
        }
        else{
            Category::where('id', $id)->update([
                'name_ru' => $name_ru,
                'name_en' => $name_en,
                'name_uz' => $name_uz,
                'name_tr' => $name_tr,
                'name_ar' => $name_ar,
                'description_ru' => $description_ru,
                'description_en' => $description_en,
                'description_uz' => $description_uz,
                'description_tr' => $description_tr,
                'description_ar' => $description_ar,
                'text_ru' => $text_ru,
                'text_en' => $text_en,
                'text_uz' => $text_uz,
                'text_tr' => $text_tr,
                'text_ar' => $text_ar,
                'position' => $position,
            ]);
            return redirect()->route('categories.index');
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

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success_message', 'Опрос ' . $category->name . ' успешно удален.');
    }
}
