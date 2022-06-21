<?php

namespace App\Models\Penghitungan;

class HitungKedekatanRelatifSolusiIdeal
{
    public function __construct($JarakSolusiIdealPositifNegatif, $JumlahData)
    {
        $this->JarakSolusiIdealPositifNegatif = $JarakSolusiIdealPositifNegatif;
        $this->JumlahData = $JumlahData;
    }

    public function HitungKedekatanRelatif()
    {
        for ($i = 0; $i < $this->JumlahData; $i++) {
            $this->Relatif[$i] = $this->JarakSolusiIdealPositifNegatif["Minus"][$i] / ($this->JarakSolusiIdealPositifNegatif["Plus"][$i] + $this->JarakSolusiIdealPositifNegatif["Minus"][$i]);
        }
    }

    public function nilai()
    {
        $this->HitungKedekatanRelatif();
        return $this->Relatif;
    }
}
