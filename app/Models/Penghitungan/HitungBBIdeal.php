<?php

namespace App\Models\Penghitungan;

class HitungBBIdeal
{
    public function __construct($tinggiBadan)
    {
        $this->tinggiBadan = $tinggiBadan;
    }

    public function nilai()
    {
        $this->BBIdeal = ($this->tinggiBadan - 100) * 0.9;
        return $this->BBIdeal;
    }
}
