<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Category;
use App\Models\MainPageSliders;
use App\Models\PriceList;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){
        $categories = (new Category)->getMainCategories(3);
        $products = (new Product)->getMainProducts(6);

        return view('front/index')->with([
            'main_categories' => $categories,
            'products' => $products
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
