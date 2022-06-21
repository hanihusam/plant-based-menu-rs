<?php

namespace App\Models\Penghitungan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonversiKombinasi
{
    public function __construct($DaftarMenuMakanan, $variable)
    {
        $this->variable = $variable;
        $this->data = $DaftarMenuMakanan;
        $this->JumlahData = count($DaftarMenuMakanan);
    }

    public function Konversi()
    {
        for ($i = 0; $i < $this->JumlahData; $i++) {
            foreach ($this->variable as $key => $value) {
                $this->Kombinasi[$i][$value] =
                    $this->data[$i]["Makan Pagi"][$value] +
                    $this->data[$i]["Snack 1"][$value] +
                    $this->data[$i]["Makan Siang"][$value] +
                    $this->data[$i]["Snack 2"][$value] +
                    $this->data[$i]["Makan Malam"][$value];
            }
        }
    }

    public function nilai()
    {
        $this->Konversi();
        return $this->Kombinasi;
    }
}
