<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainPageSliders;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = MainPageSliders::firstOrFail();

        return view('back/sliders')->with([
            'sliders' => $sliders
        ]);
    }

    public function store(Request $request){
        $image_ru_name = '';
        $image_en_name = '';
        $image_uz_name = '';
        $image_tr_name = '';
        $image_ar_name = '';
        $video_ru_name = '';
        $video_en_name = '';
        $video_uz_name = '';
        $video_tr_name = '';
        $video_ar_name = '';

        $slider = MainPageSliders::firstOrFail();
        $image_ru = $request->image_url_ru;
        $image_en = $request->image_url_en;
        $image_uz = $request->image_url_uz;
        $image_tr = $request->image_url_tr;
        $image_ar = $request->image_url_ar;

        $video_ru = $request->video_url_ru;
        $video_en = $request->video_url_en;
        $video_uz = $request->video_url_uz;
        $video_tr = $request->video_url_tr;
        $video_ar = $request->video_url_ar;

        if ($image_ru != null){
            $image_ru_name = '/img/sliders/' . time() . '.' . $image_ru->extension();
            $image_ru->move(public_path('img/sliders/'), $image_ru_name);
        }
        else {
            $image_ru_name = $slider->image_url_ru;
        }
        if ($image_en != null){
            $image_en_name = '/img/sliders/' . time() . '.' . $image_en->extension();
            $image_en->move(public_path('img/sliders/'), $image_en_name);
        }
        else {
            $image_en_name = $slider->image_url_en;
        }
        if ($image_uz != null){
            $image_uz_name = '/img/sliders/' . time() . '.' . $image_uz->extension();
            $image_uz->move(public_path('img/sliders/'), $image_uz_name);
        }
        else {
            $image_uz_name = $slider->image_url_uz;
        }
        if ($image_tr != null){
            $image_tr_name = '/img/sliders/' . time() . '.' . $image_tr->extension();
            $image_tr->move(public_path('img/sliders/'), $image_tr_name);
        }
        else {
            $image_tr_name = $slider->image_url_tr;
        }
        if ($image_ar != null){
            $image_ar_name = '/img/sliders/' . time() . '.' . $image_ar->extension();
            $image_ar->move(public_path('img/sliders/'), $image_ar_name);
        }
        else {
            $image_ar_name = $slider->image_url_ar;
        }
        if ($video_ru != null){
            $video_ru_name = '/img/sliders/' . time() . '.' . $video_ru->extension();
            $video_ru->move(public_path('img/sliders/'), $video_ru_name);
        }
        else {
            $video_ru_name = $slider->video_url_ru;
        }
        if ($video_en != null){
            $video_en_name = '/img/sliders/' . time() . '.' . $video_en->extension();
            $video_en->move(public_path('img/sliders/'), $video_en_name);
        }
        else {
            $video_en_name = $slider->video_url_en;
        }
        if ($video_uz != null){
            $video_uz_name = '/img/sliders/' . time() . '.' . $video_uz->extension();
            $video_uz->move(public_path('img/sliders/'), $video_uz_name);
        }
        else {
            $video_uz_name = $slider->video_url_uz;
        }
        if ($video_tr != null){
            $video_tr_name = '/img/sliders/' . time() . '.' . $video_tr->extension();
            $video_tr->move(public_path('img/sliders/'), $video_tr_name);
        }
        else {
            $video_tr_name = $slider->video_url_tr;
        }
        if ($video_ar != null){
            $video_ar_name = '/img/sliders/' . time() . '.' . $video_ar->extension();
            $video_ar->move(public_path('img/sliders/'), $video_ar_name);
        }
        else {
            $video_ar_name = $slider->video_url_ar;
        }

        MainPageSliders::where('id', 1)->update([
            'image_url_ru' => $image_ru_name,
            'image_url_en' => $image_en_name,
            'image_url_uz' => $image_uz_name,
            'image_url_tr' => $image_tr_name,
            'image_url_ar' => $image_ar_name,
            'video_url_ru' => $video_ru_name,
            'video_url_en' => $video_en_name,
            'video_url_uz' => $video_uz_name,
            'video_url_tr' => $video_tr_name,
            'video_url_ar' => $video_ar_name
        ]);

        return redirect()->back();
    }

    public function isVideo(MainPageSliders $slider){
        if ($slider->is_video == 0) {
            MainPageSliders::where('id', 1)->update([
                'is_video' => 1
            ]);
        } else {
            MainPageSliders::where('id', 1)->update([
                'is_video' => 0
            ]);
        }
        return redirect()->back();
    }
}
