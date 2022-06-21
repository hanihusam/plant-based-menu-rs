<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMakanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
    ];
    public $timestamps = false;

    public function MenuMakanan()
    {
        return $this->hasMany(MenuMakanan::class);
    }
}
