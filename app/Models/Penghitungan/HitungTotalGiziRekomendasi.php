<?php

namespace App\Models\Penghitungan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HitungTotalGiziRekomendasi
{
    public function __construct($HasilRekomendasi)
    {
        $this->HasilRekomendasi = $HasilRekomendasi;
        $this->variabel = ["kalori", "karbohidrat", "protein", "lemak"];
    }

    public function HitungTotalGizi()
    {
        $this->totalGizi = [];
        foreach ($this->variabel as $gizi) {
            $temp = 0;
            foreach ($this->HasilRekomendasi as $key => $value) {
                $temp += $value[$gizi];
            }
            $this->totalGizi[$gizi] = $temp;
        }
    }

    public function nilai()
    {
        $this->HitungTotalGizi();
        return $this->totalGizi;
    }
}
