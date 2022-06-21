<?php

namespace App\Models\Penghitungan;

class HitungUrutanAlternatif
{
    public function __construct($KedekatanRelatifSolusiIdeal, $JumlahData)
    {
        $this->KedekatanRelatifSolusiIdeal = $KedekatanRelatifSolusiIdeal;
        $this->JumlahData = $JumlahData;
    }

    public function HitungUrutanAlternatif()
    {
        $rekomendasi = 0;
        $max = 0;
        for ($i = 0; $i < $this->JumlahData; $i++) {
            if ($this->KedekatanRelatifSolusiIdeal[$i] > $max) {
                $max = $this->KedekatanRelatifSolusiIdeal[$i];
                $rekomendasi = $i;
            }
        }
        $this->Diurutkan = $rekomendasi;
    }

    public function nilai()
    {
        $this->HitungUrutanAlternatif();
        return $this->Diurutkan;
    }
}
