<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $table = 'certificates';
    public $timestamps = false;
    protected $fillable = [
        'name', 'path', 'text_ru', 'text_en', 'text_uz', 'text_tr', 'text_ar'
    ];

    public function certificateImages(){
        return $this->hasMany(CertificateImages::class, 'certificate_id', 'id');
    }
}
