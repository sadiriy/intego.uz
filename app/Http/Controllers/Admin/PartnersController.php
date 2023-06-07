<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partners;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index(){
        $partners = Partners::all();

        return view('back/partners')->with([
            'partners' => $partners
        ]);
    }

    public function upload(Request $request){
        $name = $request['name'];
        $image = $request['image'];
        if ($image != null){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img/partners/'), $imageName);
        }
        $url = 'img/partners/' . $imageName;

        Partners::create([
            'name' => $name,
            'url' => $url
        ]);

        return redirect()->route('partners.index');
    }

    public function delete(Partners $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('success_message', 'Партнер ' . $partner->name . ' успешно удален.');
    }
}
