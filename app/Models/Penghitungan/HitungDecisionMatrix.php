<?php

namespace App\Models\Penghitungan;

class HitungDecisionMatrix
{
    public function __construct($EnergiPerhari)
    {
        $this->EnergiPerHari = $EnergiPerhari;
    }

    public function HitungAKG()
    {
        $this->data = [];
        $this->data["karbohidrat"]["AKG"] = 0.60 * $this->EnergiPerHari / 4;
        $this->data["protein"]["AKG"] = 0.15 * $this->EnergiPerHari / 4;
        $this->data["lemak"]["AKG"] = 0.25 * $this->EnergiPerHari / 9;
    }

    public function HitungTotalNilai()
    {
        $this->TotalNilai = $this->data["karbohidrat"]["AKG"] + $this->data["protein"]["AKG"] + $this->data["lemak"]["AKG"];
        $this->data["karbohidrat"]["TotalNilai"] = $this->TotalNilai;
        $this->data["protein"]["TotalNilai"] = $this->TotalNilai;
        $this->data["lemak"]["TotalNilai"] = $this->TotalNilai;
    }

    public function HitungBerat()
    {
        $this->data["karbohidrat"]["Berat"] = $this->data["karbohidrat"]["AKG"] / $this->TotalNilai;
        $this->data["protein"]["Berat"] = $this->data["protein"]["AKG"] / $this->TotalNilai;
        $this->data["lemak"]["Berat"] = $this->data["lemak"]["AKG"] / $this->TotalNilai;
    }

    public function nilai()
    {
        $this->HitungAKG();
        $this->HitungTotalNilai();
        $this->HitungBerat();
        return $this->data;
    }
}
