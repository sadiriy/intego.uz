<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPageSliders extends Model
{
    protected $table = 'mainpage_sliders';
    public $timestamps = false;

    protected $fillable = [
        'id', 'image_url', 'video_url'
    ];
}
