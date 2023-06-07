<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parameters;
use App\Models\Product;
use App\Models\Attributes;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function index(Product $product)
    {
        $parameters = $product->parameters()->with('attributes')->get();
        $attributes = Attributes::where('category_id', $product->category_id)->get();

        return view('back/parameters')->with([
            'parameters' => $parameters,
            'product' => $product,
            'attributes' => $attributes,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Product $product)
    {
        $id = $request['id'];
        $product_id = $product->id;
        $attribute_id = $request['attribute_id'];
        $value = $request['value'];

        if ($id == null){
            Parameters::create([
                'value' => $value,
                'product_id' => $product_id,
                'attribute_id' => $attribute_id,
            ]);

            return redirect()->route('parameters.index', $product)->with('success_message', 'Параметр успешно создан');
        }
        else{
            Parameters::where('id', $id)->update([
               'value' => $value,
               'attribute_id' => $attribute_id,
            ]);

            return redirect()->route('parameters.index', $product)->with('success_message', 'Параметр успешно изменен');
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
    public function destroy(Product $product, Parameters $parameter)
    {
        $parameter->delete();
        return redirect()->route('parameters.index', $product)->with('success_message', 'Параметр успешно удален');
    }
}
