<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = "attributes";
    public $timestamps = false;

    protected $fillable = [
        'id', 'name_ru', 'unit_ru',
    ];
}
