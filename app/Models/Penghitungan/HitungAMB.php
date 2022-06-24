<?php

namespace App\Models\Penghitungan;

class HitungAMB
{
    public function __construct($JenisKelamin, $BBIdeal, $TinggiBadan, $Umur)
    {
        $this->JenisKelamin = $JenisKelamin;
        $this->BBIdeal = $BBIdeal;
        $this->TinggiBadan = $TinggiBadan;
        $this->Umur = $Umur;
    }

    public function Hitung_Lakilaki()
    {
        $this->AMB_Lakilaki = 66 + (13.7 * $this->BBIdeal) + (5 * $this->TinggiBadan) - (6.8 * $this->Umur);
    }

    public function Hitung_Perempuan()
    {
        $this->AMB_Perempuan = 655 + (9.6 * $this->BBIdeal) + (1.8 * $this->TinggiBadan) - (4.7 * $this->Umur);
    }

    public function nilai()
    {
        if ($this->JenisKelamin == "Female") {
            $this->Hitung_Perempuan();
            return $this->AMB_Perempuan;
        } elseif (($this->JenisKelamin == "Male")) {
            $this->Hitung_Lakilaki();
            return $this->AMB_Lakilaki;
        }
    }
}
