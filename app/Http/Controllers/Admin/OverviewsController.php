<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Overviews;
use Illuminate\Http\Request;

class OverviewsController extends Controller
{
    public function index(){
        $overviews = Overviews::all();

     return view('front/overviews')->with([
         'overviews' => $overviews
     ]);
    }

    public function list(){
        $overviews = Overviews::all();

        return view('back/overviews')->with([
            'overviews' => $overviews
        ]);
    }

    public function upload(Request $request){
        $name = $request['name'];
        $image = $request['image'];
        if ($image != null){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('img/overviews/'), $imageName);
        }
        $path = 'img/overviews/' . $imageName;

        Overviews::create([
            'name' => $name,
            'url' => $path
        ]);

        return redirect()->route('overviews.admin');
    }

    public function delete(Overviews $overview){
        $overview->delete();
        return redirect()->route('overviews.admin');
    }
}
