<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $table = 'order_products';

    protected $fillable = [
        'id', 'name', 'slug', 'order_id', 'price',
    ];

    public function orders(){
        $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
