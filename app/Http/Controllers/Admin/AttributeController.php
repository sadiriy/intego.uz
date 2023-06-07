<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Category;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attributes::with('categories')->get();
        $categories = Category::all();

        return view('back/attributes')->with([
            'attributes' => $attributes,
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
        $unit_ru = $request['unit_ru'];
        $unit_en = $request['unit_en'];
        $unit_uz = $request['unit_uz'];
        $unit_tr = $request['unit_tr'];
        $unit_ar = $request['unit_ar'];
        $category_id = $request['category'];

        if ($id == null){
            Attributes::create([
                'name_ru' => $name_ru,
                'name_en' => $name_en,
                'name_uz' => $name_uz,
                'name_tr' => $name_tr,
                'name_ar' => $name_ar,
                'unit_ru' => $unit_ru,
                'unit_en' => $unit_en,
                'unit_uz' => $unit_uz,
                'unit_tr' => $unit_tr,
                'unit_ar' => $unit_ar,
                'category_id' => $category_id,
            ]);
            return redirect()->route('attributes.index')->with('success_message', 'Атрибут успешно создан');
        }
        else{
            Attributes::where('id', $id)->update([
                'name_ru' => $name_ru,
                'name_en' => $name_en,
                'name_uz' => $name_uz,
                'name_tr' => $name_tr,
                'name_ar' => $name_ar,
                'unit_ru' => $unit_ru,
                'unit_en' => $unit_en,
                'unit_uz' => $unit_uz,
                'unit_tr' => $unit_tr,
                'unit_ar' => $unit_ar,
               'category_id' => $category_id,
            ]);
            return redirect()->route('attributes.index')->with('success_message', 'Атрибут успешно изменен');
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

    public function destroy(Attributes $attribute)
    {
        $attribute->delete();
        return redirect()->route('attributes.index')->with('success_message', 'Атрибут успешно удален');
    }
}
