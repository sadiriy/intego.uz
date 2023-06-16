<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttributes extends Model
{
    use HasFactory;
    protected $table = 'category_attributes';
    public $timestamps = false;
    protected $fillable = [
        'category_id', 'attribute_id'
    ];

    public function attribute(){
        $this->hasMany(Attributes::class, 'id', 'attribute_id');
    }
}
