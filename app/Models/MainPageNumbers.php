<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPageNumbers extends Model
{
    protected $table = 'mainpage_numbers';
    public $timestamps = false;

    protected $fillable = [
        'id', 'number', 'unit_ru', 'unit_en', 'unit_uz', 'unit_tr', 'text_ru', 'text_en', 'text_uz', 'text_tr',
    ];

}
