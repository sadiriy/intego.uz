<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parameter;
use App\Models\Product;
use App\Models\Attributes;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function index(Product $product)
    {
        $parameters = $product->parameters()->with('attributes')->get();
        $attributes = Attributes::all();
        return view('back/parameters')->with([
            'product' => $product,
            'parameters' => $parameters,
            'attributes' => $attributes,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|numeric|exists:products,id',
            'attribute_id' => 'required|numeric|exists:attributes,id',
            'value' => 'required|string|max:255',
        ]);

        $parameter = $request['id'] ? Parameter::find($request['id']) : new Parameter();

        $parameter->product_id = $data['product_id'];
        $parameter->attribute_id = $data['attribute_id'];
        $parameter->value = $data['value'];
        $parameter->save();

        return redirect()->route('parameters.index', $data['product_id'])->with('success_message', $request['id'] ? 'Параметр успешно изменен.' : 'Параметр успешно создан.');
    }

    public function destroy(Product $product, Parameter $parameter)
    {
        $parameter->delete();
        return redirect()->route('parameters.index', $product)->with('success_message', 'Параметр успешно удален');
    }
}
