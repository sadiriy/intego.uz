<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Overviews;
use App\Models\Pages;
use App\Models\Partners;
use App\Models\Requisites;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Pages::all();

        return view('back/pages')->with([
            'pages' => $pages,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $id = $request['id'];
        $title_ru = $request['title_ru'];
        $title_en = $request['title_en'];
        $title_uz = $request['title_uz'];
        $title_tr = $request['title_tr'];
        $title_ar = $request['title_ar'];
        $text_ru = $request['text_ru'];
        $text_en = $request['text_en'];
        $text_uz = $request['text_uz'];
        $text_tr = $request['text_tr'];
        $text_ar = $request['text_ar'];
        $btn_text_ru = $request['btn_text_ru'];
        $btn_text_en = $request['btn_text_en'];
        $btn_text_uz = $request['btn_text_uz'];
        $btn_text_tr = $request['btn_text_tr'];
        $btn_text_ar = $request['btn_text_ar'];
        $btn_url_ru = $request['btn_url_ru'];
        $btn_url_en = $request['btn_url_en'];
        $btn_url_uz = $request['btn_url_uz'];
        $btn_url_tr = $request['btn_url_tr'];
        $btn_url_ar = $request['btn_url_ar'];
        $seo = $request['seo'];

        Pages::where('id', $id)->update([
            'title_ru' => $title_ru,
            'title_en' => $title_en,
            'title_uz' => $title_uz,
            'title_tr' => $title_tr,
            'title_ar' => $title_ar,
            'text_ru' => $text_ru,
            'text_en' => $text_en,
            'text_uz' => $text_uz,
            'text_tr' => $text_tr,
            'text_ar' => $text_ar,
            'btn_text_ru' => $btn_text_ru,
            'btn_text_en' => $btn_text_en,
            'btn_text_uz' => $btn_text_uz,
            'btn_text_tr' => $btn_text_tr,
            'btn_text_ar' => $btn_text_ar,
            'btn_url_ru' => $btn_url_ru,
            'btn_url_en' => $btn_url_en,
            'btn_url_uz' => $btn_url_uz,
            'btn_url_tr' => $btn_url_tr,
            'btn_url_ar' => $btn_url_ar,
            'seo' => $seo,
        ]);

        return redirect()->route('pages.index')->with('success_message', 'Страница была успешно изменена');
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

    public function about(){
        $about = Pages::where('name', 'about')->get();

        return view('front/about')->with([
            'about' => $about,
        ]);
    }
    public function certificates(){
        $certificates = Pages::where('name', 'certificates')->get();

        return view('front/certificates')->with([
            'certificates' => $certificates,
        ]);
    }
    public function partners(){
        $partners = Pages::where('name', 'partners')->get();
        $partner_logos = Partners::all();
        $overviews = Overviews::all();

        return view('front/partners')->with([
            'partners' => $partners,
            'partner_logos' => $partner_logos,
            'overviews' => $overviews
        ]);
    }
    public function zakupki(){
        $zakupki = Pages::where('name', 'zakupki')->get();

        return view('front/zakupki')->with([
            'zakupki' => $zakupki,
        ]);
    }
    public function contacts(){
        $contacts = Contacts::all();
        $requisites = Requisites::FirstOrFail();

        return view('front/contacts')->with([
            'contacts' => $contacts,
            'requisites' => $requisites
        ]);
    }
}
