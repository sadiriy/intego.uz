<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = "partners";
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'url'
    ];
}
