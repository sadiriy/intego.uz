<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public $timestamps = false;

    protected $fillable = [
        'id', 'name_ru', 'name_en', 'name_uz', 'name_tr', 'image', 'description_ru', 'description_en', 'description_uz', 'description_tr', 'position',
        'text_ru', 'text_en', 'text_uz', 'text_tr', 'text_ar',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function attributes(){
        return $this->hasMany(Attributes::class, 'category_id', 'id');
    }
}
