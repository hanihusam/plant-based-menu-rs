<?php

namespace App\Models\Penghitungan;


class HitungKebutuhanEnergiPerWaktuMakan
{
    public function __construct($EnergiPerHari)
    {
        $this->EnergiPerHari = $EnergiPerHari;
    }

    public function perWaktuMakan()
    {
        $this->data = [];
        $this->data["Total"] = $this->EnergiPerHari;
        $this->data["Normal"]["Makan Pagi"] = $this->EnergiPerHari * 0.25;
        $this->data["Normal"]["Snack 1"] = $this->EnergiPerHari * 0.10;
        $this->data["Normal"]["Makan Siang"] = $this->EnergiPerHari * 0.30;
        $this->data["Normal"]["Snack 2"] = $this->EnergiPerHari * 0.10;
        $this->data["Normal"]["Makan Malam"] = $this->EnergiPerHari * 0.25;
        $this->nilaiMinimal();
        $this->nilaiMaksimal();
        return $this->data;
    }

    public function nilaiMaksimal()
    {
        $this->data["Maksimal"]["Makan Pagi"] = $this->data["Normal"]["Makan Pagi"] * 1.20;
        $this->data["Maksimal"]["Snack 1"] = $this->data["Normal"]["Snack 1"] * 1.20;
        $this->data["Maksimal"]["Makan Siang"] = $this->data["Normal"]["Makan Siang"] * 1.20;
        $this->data["Maksimal"]["Snack 2"] = $this->data["Normal"]["Snack 2"] * 1.20;
        $this->data["Maksimal"]["Makan Malam"] = $this->data["Normal"]["Makan Malam"] * 1.20;
    }

    public function nilaiMinimal()
    {
        $this->data["Minimal"]["Makan Pagi"] = $this->data["Normal"]["Makan Pagi"] * 0.80;
        $this->data["Minimal"]["Snack 1"] = $this->data["Normal"]["Snack 1"] * 0.80;
        $this->data["Minimal"]["Makan Siang"] = $this->data["Normal"]["Makan Siang"] * 0.80;
        $this->data["Minimal"]["Snack 2"] = $this->data["Normal"]["Snack 2"] * 0.80;
        $this->data["Minimal"]["Makan Malam"] = $this->data["Normal"]["Makan Malam"] * 0.80;
    }

    public function nilai()
    {
        return $this->perWaktuMakan();
    }
}
