<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'kebutuhan_energi',
        'dataDiri_id',
        'kombinasiMenu_id',
    ];

    public function DataDiri()
    {
        return $this->belongsTo(DataDiri::class);
    }

    public function KombinasiMenu()
    {
        return $this->hasOne(KombinasiMenu::class);
    }
}
