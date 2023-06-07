<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;
    protected $table = "orders";
    public $timestamps = false;

    protected $fillable = [
        'id', 'orderDetails', 'clientName', 'clientPhone', 'date', 'checked'
    ];
}
