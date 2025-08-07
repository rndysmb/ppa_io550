<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mentor extends Authenticatable
{
    use HasFactory;

    protected $table = 'data_mentor';
    protected $fillable = ['username', 'nama', 'password'];
    public $timestamps = false;

    // Mentor memiliki banyak anak
    public function anak()
    {
        return $this->hasMany(Anak::class, 'mentor_id');
    }
    
}
