<?php

namespace App\Models\Penghitungan;

class HitungKebutuhanEnergiPerHari
{
    public function __construct($JenisKelamin, $Aktivitas_Fisik, $AMB)
    {
        $this->JenisKelamin = $JenisKelamin;
        $this->Aktivitas_Fisik = $Aktivitas_Fisik;
        $this->AMB = $AMB;
    }

    public function Hitung_Lakilaki()
    {
        switch ($this->Aktivitas_Fisik) {
            case "Sangat Ringan":
                $this->KebutuhanEnergi = 1.30;
                break;
            case "Ringan":
                $this->KebutuhanEnergi = 1.65;
                break;
            case "Sedang":
                $this->KebutuhanEnergi = 1.76;
                break;
            case "Berat":
                $this->KebutuhanEnergi = 2.10;
                break;
        }
    }

    public function Hitung_Perempuan()
    {
        switch ($this->Aktivitas_Fisik) {
            case "Sangat Ringan":
                $this->KebutuhanEnergi = 1.30;
                break;
            case "Ringan":
                $this->KebutuhanEnergi = 1.55;
                break;
            case "Sedang":
                $this->KebutuhanEnergi = 1.70;
                break;
            case "Bera":
                $this->KebutuhanEnergi = 2.00;
                break;
        }
    }

    public function nilai()
    {
        if ($this->JenisKelamin == "Perempuan") {
            $this->Hitung_Perempuan();
        } elseif (($this->JenisKelamin == "Laki-laki")) {
            $this->Hitung_Lakilaki();
        }

        $this->KebutuhanEnergiPerHari = $this->AMB * $this->KebutuhanEnergi;
        return $this->KebutuhanEnergiPerHari;
    }
}
