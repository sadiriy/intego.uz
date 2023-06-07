<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $table = "settings";
    public $timestamps = false;

    protected $fillable = [
        'id', 'phone', 'email', 'logo', 'logo_white', 'fb_link', 'tg_link', 'wa_link', 'li_link'
    ];
}
