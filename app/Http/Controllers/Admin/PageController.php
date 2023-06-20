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
        $text_ru = $request['text_ru'];
        $btn_text_ru = $request['btn_text_ru'];
        $btn_url_ru = $request['btn_url_ru'];
        $seo = $request['seo'];

        Pages::where('id', $id)->update([
            'title_ru' => $title_ru,
            'text_ru' => $text_ru,
            'btn_text_ru' => $btn_text_ru,
            'btn_url_ru' => $btn_url_ru,
            'seo' => $seo,
        ]);

        return redirect()->route('pages.index')->with('success_message', 'Страница была успешно изменена');
    }
}
