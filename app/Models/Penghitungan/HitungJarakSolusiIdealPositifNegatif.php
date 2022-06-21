<?php

namespace App\Models\Penghitungan;

class HitungJarakSolusiIdealPositifNegatif
{

    public function __construct($BeratDecisionMatrixTernormalisasi, $SolusiIdealPositifNegatif, $JumlahData, $variable)
    {
        $this->BeratDecisionMatrixTernormalisasi = $BeratDecisionMatrixTernormalisasi;
        $this->SolusiIdealPositifNegatif = $SolusiIdealPositifNegatif;
        $this->JumlahData = $JumlahData;
        $this->variable = $variable;
    }

    public function HitungJarakSolusiIdeal()
    {
        //Jarak Plus
        for ($i = 0; $i < $this->JumlahData; $i++) {
            $temp = 0;
            foreach ($this->variable as $value) {
                $temp += pow(($this->SolusiIdealPositifNegatif[$value]["Plus"] - $this->BeratDecisionMatrixTernormalisasi[$value][$i]), 2);
            }
            $this->Jarak["Plus"][$i] = sqrt($temp);
        }


        //Jarak Minus
        for ($i = 0; $i < $this->JumlahData; $i++) {
            $temp = 0;
            foreach ($this->variable as $value) {
                $temp += pow(($this->SolusiIdealPositifNegatif[$value]["Minus"] - $this->BeratDecisionMatrixTernormalisasi[$value][$i]), 2);
            }
            $this->Jarak["Minus"][$i] = sqrt($temp);
        }
    }

    public function nilai()
    {
        $this->HitungJarakSolusiIdeal();
        return $this->Jarak;
    }
}
