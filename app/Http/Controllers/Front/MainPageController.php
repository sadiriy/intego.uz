<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Calculation;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\Slider;
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
        $slider_image = Slider::all()->first();
        $pages = Pages::all();

        return view('front/index')->with([
            'main_categories' => $categories,
            'products' => $products,
            'slide' => $slider_image,
            'pages' => $pages,
        ]);
    }

    public function page($page){
        $page_contents = Pages::where('url', $page)->firstOrFail() ?? abort(404);
        $contents = file_get_contents( __DIR__ . '/../../../../resources/pages/' . $page_contents->url . '.html') ?? "Пустая страница";

        return view('front/page')->with([
            'page' => $page_contents,
            'content' => $contents
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
