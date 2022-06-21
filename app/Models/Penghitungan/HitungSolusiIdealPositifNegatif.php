<?php

namespace App\Models\Penghitungan;

class HitungSolusiIdealPositifNegatif
{
    public function __construct($BeratDecisionMatrixTernormalisasi, $variable)
    {
        $this->BeratDecisionMatrixTernormalisasi = $BeratDecisionMatrixTernormalisasi;
        $this->variable = $variable;
    }

    public function SolusiIdeal()
    {
        foreach ($this->variable as  $value) {
            $this->Solusi[$value]["Plus"] = max($this->BeratDecisionMatrixTernormalisasi[$value]);
            $this->Solusi[$value]["Minus"] = min($this->BeratDecisionMatrixTernormalisasi[$value]);
        }
    }

    public function nilai()
    {
        $this->SolusiIdeal();
        return $this->Solusi;
    }
}
