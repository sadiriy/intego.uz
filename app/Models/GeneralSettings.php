<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $table = "website_settings";
    public $timestamps = false;

    protected $fillable = [
        'id', 'phone', 'email', 'logo', 'fb_ling', 'tg_link', 'in_link'
    ];
}
