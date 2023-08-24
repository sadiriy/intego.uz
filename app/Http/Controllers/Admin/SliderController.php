<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::firstOrFail();

        return view('back/sliders')->with([
            'sliders' => $sliders
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'slide_image' => 'required'
        ]);
        $image_ru = $request->slide_image;

        $image_ru_name = '/img/sliders/' . time() . '.' . $image_ru->extension();
        $image_ru->move(public_path('img/sliders/'), $image_ru_name);

        Slider::where('id', 1)->update([
            'slide_image' => $image_ru_name,
        ]);

        return redirect()->back();
    }

    public function isVideo(Slider $slider){
        if ($slider->is_video == 0) {
            Slider::where('id', 1)->update([
                'is_video' => 1
            ]);
        } else {
            Slider::where('id', 1)->update([
                'is_video' => 0
            ]);
        }
        return redirect()->back();
    }
}
