<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Category;
use App\Models\LmeCourse;
use App\Models\MainPageNumbers;
use App\Models\MainPagePrivileges;
use App\Models\MainPageSliders;
use App\Models\Partners;
use App\Models\PriceList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MainPageController extends Controller
{
    public function index(){
        $categories = Category::orderBy('position')->get();
//        $api = LmeCourse::getLmeCourse();
//        $copper = round(1/$api['LME-XCU']*32150.746361894, 6);
//        $aluminium = round(1/$api['LME-ALU']*32150.746361894, 6);
        $date = Carbon::now()->format('d.m.Y');
        $numbers = MainPageNumbers::all();
        $privileges = MainPagePrivileges::all();
        $sliders = MainPageSliders::firstOrFail();
        $partners = Partners::all();


        return view('front/index')->with([
            'categories' => $categories,
//            'copper' => $copper,
//            'aluminium' => $aluminium,
            'date' => $date,
            'numbers' => $numbers,
            'privileges' => $privileges,
            'sliders' => $sliders,
            'partners' => $partners
        ]);
    }

    public function priceList(Request $request){
        $name = $request['name'];
        $phone = $request['phone'];
        $category = $request['category'];
        $date = Carbon::now();

        PriceList::create([
            'name' => $name,
            'phone' => $phone,
            'category_id' => $category,
            'date' => $date,
            'is_checked' => 0,

        ]);

        return redirect('/')->with('success_message',  __('Ваша заявка принята'));
    }

    public function calculation(Request $request){
        $name = $request['name'];
        $phone = $request['phone'];
        $message = $request['message'];
        $file = $request['uploaded_file'];
        $fileName = '';
        $date = Carbon::now();

        if ($file != null){
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/'), $fileName);
        }

        Calculation::create([
            'name' => $name,
            'phone' => $phone,
            'message' => $message,
            'file' => 'uploads/'.$fileName,
            'date' => $date,
            'is_checked' => 0
        ]);

        return redirect('/')->with('success_message',  __('Ваша заявка принята'));
    }
}
