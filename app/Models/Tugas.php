<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'batas_waktu',
        'mentor_id',
    ];

    // Relasi: tugas dimiliki oleh satu mentor
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    // Relasi: tugas bisa dikumpulkan oleh banyak anak
    public function pengumpulan()
    {
        return $this->hasMany(PengumpulanTugas::class, 'tugas_id');
    }
}
