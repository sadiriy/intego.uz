<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    protected $table = 'calculations';
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'phone', 'message', 'file', 'date', 'is_checked'];
}
