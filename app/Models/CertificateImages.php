<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateImages extends Model
{
    protected $table = 'certificate_images';
    public $timestamps = false;
    protected $fillable = [
        'certificate_id', 'path'
    ];

    public function certificates(){
        return $this->$this->belongsTo(Certificates::class, 'certificate_id', 'id');
    }
}
