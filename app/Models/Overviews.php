<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overviews extends Model
{
    protected $table = "reviews";
    public $timestamps = false;
    protected $fillable = [
        'name', 'url'
    ];
}
