<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameters extends Model
{
    protected $table = "parameters";
    public $timestamps = false;

    protected $fillable = [
        'id', 'value', 'product_id', 'attribute_id'
    ];

    public function attributes(){
        return $this->belongsTo(Attributes::class, 'attribute_id', 'id');
    }
}
