<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    protected $table = 'pengumpulan_tugas';
    protected $fillable = ['tugas_id', 'anak_id', 'jawaban_teks', 'file_jawaban'];

    // Relasi: pengumpulan tugas milik satu tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    // Relasi: pengumpulan tugas dilakukan oleh satu anak
    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }
}
