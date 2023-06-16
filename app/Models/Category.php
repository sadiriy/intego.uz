<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    public $timestamps = false;

    protected $fillable = [
        'id', 'name_ru', 'description_ru', 'image', 'position',
    ];

    public function getMainCategories(int $amount){
        return Category::where('is_popular', 1)->take($amount)->get() ?? null;
    }

    public function getAllCategories()
    {
        return Category::orderBy('position', 'asc')->orderBy('id', 'asc')->get() ?? null;
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function categoryAttributes(){
        return $this->hasMany(CategoryAttributes::class, 'category_id', 'id');
    }
}
