<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_id',
        'nama_menu',
        'kalori',
        'karbohidrat',
        'protein',
        'lemak',
        'sajian',
        'komposisi',
        'cara_masak',
    ];

    public function JenisMakanan()
    {
        return $this->belongsTo(JenisMakanan::class);
    }

    public function KombinasiMenu()
    {
        return $this->hasMany(KombinasiMenu::class);
    }
}
