<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'berat_badan',
        'tinggi_badan',
        'umur',
        'jenis_kelamin',
        'aktivitas_fisik',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Rekomendasi()
    {
        return $this->hasOne(Rekomendasi::class);
    }
}
