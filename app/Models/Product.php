<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;

    protected $fillable = [
        'id', 'slug', 'name_ru', 'description_ru', 'price', 'category_id'
    ];

    public function getMainProducts(int $amount){
        return Product::where('is_popular', 1)->take($amount)->get() ?? null;
    }

    public function getCategoryProducts(Category $category){
        return Product::where('category_id', $category->id)->get() ?? null;
    }

    public function getRecommendedProducts(int $amount, Product $product){
        return Product::inRandomOrder()->where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit($amount)->get() ?? null;
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function parameters(){
        return $this->hasMany(Parameters::class, 'product_id', 'id');
    }
}
