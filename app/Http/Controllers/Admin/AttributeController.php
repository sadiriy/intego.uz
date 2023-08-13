<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attributes;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attributes::all();

        return view('back/attributes')->with([
            'attributes' => $attributes,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'name_ru' => 'required|max:255',
           'unit_ru' => 'max:255',
        ]);

        $name = $data['name_ru'];
        $unit = $data['unit_ru'];

        $attribute = $request['id'] ? Attributes::find($request['id']) : new Attributes();
        $attribute->name_ru = $name;
        $attribute->unit_ru = $unit;
        $attribute->save();

        return redirect()->route('attributes.index')->with('success_message', $request['id'] ? 'Атрибут успешно изменен.' : 'Атрибут успешно создан.');
    }

    public function destroy(Attributes $attribute)
    {
        $attribute->delete();
        return redirect()->route('attributes.index')->with('success_message', 'Атрибут успешно удален');
    }
}
