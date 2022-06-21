<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KombinasiMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'rekomendasi_id',
        'makan_pagi',
        'snack_1',
        'makan_siang',
        'snack_2',
        'makan_malam',
    ];
    public $timestamps = false;

    public function MenuMakanan()
    {
        return $this->belongsTo(MenuMakanan::class);
    }

    public function Rekomendasi()
    {
        return $this->belongsTo(Rekomendasi::class);
    }
}
