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
            case "Very Light":
                $this->KebutuhanEnergi = 1.30;
                break;
            case "Light":
                $this->KebutuhanEnergi = 1.65;
                break;
            case "Medium":
                $this->KebutuhanEnergi = 1.76;
                break;
            case "Heavy":
                $this->KebutuhanEnergi = 2.10;
                break;
        }
    }

    public function Hitung_Perempuan()
    {
        switch ($this->Aktivitas_Fisik) {
            case "Very Light":
                $this->KebutuhanEnergi = 1.30;
                break;
            case "Light":
                $this->KebutuhanEnergi = 1.55;
                break;
            case "Medium":
                $this->KebutuhanEnergi = 1.70;
                break;
            case "Heavy":
                $this->KebutuhanEnergi = 2.00;
                break;
        }
    }

    public function nilai()
    {
        if ($this->JenisKelamin == "Female") {
            $this->Hitung_Perempuan();
        } elseif (($this->JenisKelamin == "Male")) {
            $this->Hitung_Lakilaki();
        }

        $this->KebutuhanEnergiPerHari = $this->AMB * $this->KebutuhanEnergi;
        return $this->KebutuhanEnergiPerHari;
    }
}
