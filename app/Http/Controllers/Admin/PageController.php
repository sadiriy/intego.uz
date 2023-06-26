<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Overviews;
use App\Models\Pages;
use App\Models\Partners;
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

    public function singlePage(?Pages $page = null){
        $page_items = Pages::where('id', $page->id)->firstOrFail() ?? null;
        $content = file_get_contents( __DIR__ . '/../../../../resources/pages/' . $page_items->url . '.html') ?? "Пустая страница";
        return view('back/page')->with([
           'page_items' => $page_items,
            'content' => $content
        ]);
    }

    public function create()
    {
        return view('back/page');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ru' => 'required|max:255',
            'url' => 'required|max:255',
            'text_ru' => 'string'
        ]);

        $page = $request['id'] ? Pages::find($request['id']) : new Pages();
        $page->title_ru = $data['title_ru'];
        $page->url = $data['url'];
        $page->save();

        file_put_contents( __DIR__ . '/../../../../resources/pages/' . $page->url . '.html', $data['text_ru']);

        return redirect()->route('pages.index')->with('success_message', $request['id'] ? 'Страница была успешно изменена' : 'Страница была успешно создана');
    }
}
