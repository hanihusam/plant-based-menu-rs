<?php

namespace App\Models\Penghitungan;

class HitungDecisionMatrixTernormalisasi
{
    public function __construct($Kombinasi, $JumlahData, $variable)
    {
        $this->Kombinasi = $Kombinasi;
        $this->JumlahData = $JumlahData;
        $this->variable = $variable;
    }

    public function HitungNormalisasi()
    {
        //Hitung Nilai X
        foreach ($this->variable as $value) {
            $temp = 0;
            for ($i = 0; $i < $this->JumlahData; $i++) {
                $temp += pow($this->Kombinasi[$i][$value], 2);
                // $this->NilaiX[$value] = pow($this->Kombinasi[$i]["Karbohidrat"], 2);
            }
            $NilaiX = sqrt($temp);
            $this->NilaiX[$value] = $NilaiX;
        }

        foreach ($this->variable as $value) {
            for ($j = 0; $j < $this->JumlahData; $j++) {

                $this->Ternormalisasi[$value][$j] = $this->Kombinasi[$j][$value] / $this->NilaiX[$value];
            }
        }
    }


    public function nilai()
    {
        $this->HitungNormalisasi();
        return $this->Ternormalisasi;
    }
}
