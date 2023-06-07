<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = "attributes";
    public $timestamps = false;

    protected $fillable = [
        'id', 'name_ru', 'name_en', 'name_uz', 'name_tr', 'unit_ru', 'unit_en', 'unit_uz', 'unit_tr', 'category_id'
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function parameters(){
        return $this->hasMany(Parameters::class, 'attribute_id', 'id');
    }
}
