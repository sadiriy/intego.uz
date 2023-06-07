<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPagePrivileges extends Model
{
    protected $table = 'mainpage_privileges';
    public $timestamps = false;

    protected $fillable = [
        'id', 'icon', 'text_ru', 'text_en', 'text_uz', 'text_tr',
    ];
}
