<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'title_ru',
        'title_en',
        'title_uz',
        'title_tr',
        'text_ru',
        'text_en',
        'text_uz',
        'text_tr',
        'seo',
        'btn_text_ru',
        'btn_text_en',
        'btn_text_uz',
        'btn_text_tr',
        'btn_text_ar',
        'btn_url_ru',
        'btn_url_en',
        'btn_url_uz',
        'btn_url_tr',
        'btn_url_ar'
    ];
}
