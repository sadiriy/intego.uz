<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;
    protected $table = "orders";

    protected $fillable = [
        'id', 'total_sum', 'client_name', 'client_phone', 'status',
    ];

    public function getOrderProducts($id){
        return OrderProducts::where('order_id', $id)->get();
    }

    public function order_products(){
        $this->hasMany(OrderProducts::class, 'order_id', 'id');
    }
}
