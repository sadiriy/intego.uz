<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\MainPageSliders;
use App\Models\Pages;
use App\Models\PriceList;
use App\Models\Product;
use App\Models\Requisites;
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

    public function about(){
//        $about = Pages::where('name', 'about')->get();

        return view('front/about');
//            ->with([
//            'about' => $about,
//        ]);
    }
    public function contacts(){
//        $contacts = Contacts::all();
//        $requisites = Requisites::FirstOrFail();

        return view('front/contacts');
//            ->with([
//            'contacts' => $contacts,
//            'requisites' => $requisites
//        ]);
    }
}
