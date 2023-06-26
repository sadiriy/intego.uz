<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'url',
        'title_ru',
    ];

    public function something($id){
        $page_items = Pages::where('id', $id)->firstOrFail() ?? abort(404);
        $content = file_get_contents( __DIR__ . '/../../../../resources/pages/' . $page_items->url . '.html') ?? "Пустая страница";

        return $content;
    }
}
