<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    protected $table = 'price_list_request';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'phone', 'category_id', 'date', 'is_checked'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
