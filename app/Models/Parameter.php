<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = "product_parameters";
    public $timestamps = false;

    protected $fillable = [
        'value', 'product_id', 'attribute_id'
    ];

    public function attributes(){
        return $this->belongsTo(Attributes::class, 'attribute_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
