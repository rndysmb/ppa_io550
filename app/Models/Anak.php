<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Anak extends Authenticatable
{
    protected $table = 'akun_anak';
    protected $fillable = ['id', 'nomor_induk', 'password', 'nama', 'mentor_id'];
    public $timestamps = false;

    // Anak dimiliki oleh seorang mentor
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    // Anak punya banyak progres bacaan
    public function progres()
    {
        return $this->hasMany(ProgresBacaan::class, 'anak_id');
    }

    // Mengambil progres bacaan terakhir anak (opsional tapi berguna)
    public function progresTerakhir()
    {
        return $this->hasOne(ProgresBacaan::class, 'anak_id')->latestOfMany();
    }
}
