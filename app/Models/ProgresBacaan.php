<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgresBacaan extends Model
{
    protected $table = 'progres_bacaan';
    protected $fillable = ['anak_id', 'kitab', 'pasal'];
    public $timestamps = true;

    // Progres bacaan dimiliki oleh seorang anak
    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }
}
