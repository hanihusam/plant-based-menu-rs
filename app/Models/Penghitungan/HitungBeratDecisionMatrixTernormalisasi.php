<?php

namespace App\Models\Penghitungan;

class HitungBeratDecisionMatrixTernormalisasi
{
    public function __construct($DecisionMatrix, $DecisionMatrixTernormalisasi, $JumlahData, $variable)
    {
        $this->DecisionMatrix = $DecisionMatrix;
        $this->DecisionMatrixTernormalisasi = $DecisionMatrixTernormalisasi;
        $this->JumlahData = $JumlahData;
        $this->variable = $variable;
    }

    public function HitungBerat()
    {
        foreach ($this->variable as $value) {
            for ($i = 0; $i < $this->JumlahData; $i++) {
                $this->Berat[$value][$i] = $this->DecisionMatrix[$value]["Berat"] * $this->DecisionMatrixTernormalisasi[$value][$i];
            }
        }
    }

    public function nilai()
    {
        $this->HitungBerat();
        return $this->Berat;
    }
}
