<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;

    protected $fillable = [
        'id', 'name_ru', 'name_en', 'name_uz', 'name_tr', 'description_ru', 'description_en', 'description_uz', 'description_tr', 'parameters', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function parameters(){
        return $this->hasMany(Parameters::class, 'product_id', 'id');
    }
}
