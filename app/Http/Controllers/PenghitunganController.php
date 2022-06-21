<?php

namespace App\Http\Controllers;

use App\Models\Penghitungan\HitungBBideal;
use App\Models\Penghitungan\HitungAMB;
use App\Models\Penghitungan\HitungKebutuhanEnergiPerHari;
use App\Models\Penghitungan\HitungKebutuhanEnergiPerWaktuMakan;
use App\Models\Penghitungan\HitungDecisionMatrix;
use App\Models\Penghitungan\HitungDecisionMatrixTernormalisasi;
use App\Models\Penghitungan\HitungBeratDecisionMatrixTernormalisasi;
use App\Models\Penghitungan\HitungSolusiIdealPositifNegatif;
use App\Models\Penghitungan\HitungJarakSolusiIdealPositifNegatif;
use App\Models\Penghitungan\HitungKedekatanRelatifSolusiIdeal;
use App\Models\Penghitungan\HitungUrutanAlternatif;


use Illuminate\Http\Request;

class PenghitunganController extends Controller
{
    public function index()
    {
        $JenisKelamin = "Perempuan";
        $TinggiBadan = 165;
        $Umur = 22;
        $Aktivitas_Fisik = "Ringan";


        //Menghitung Berat Badan Ideal
        $Proses_Hitung_BBIdeal = new HitungBBIdeal($TinggiBadan);
        $BBIdeal = $Proses_Hitung_BBIdeal->nilai();
        // return $BBIdeal;


        //Menghitung AMB
        $Proses_Hitung_AMB = new HitungAMB($JenisKelamin, $BBIdeal, $TinggiBadan, $Umur);
        $AMB = $Proses_Hitung_AMB->nilai();
        // return $AMB;


        //Menghitung Kebutuhan Energi per Hari
        $Proses_Hitung_KebutuhanEnergiPerhari = new HitungKebutuhanEnergiPerHari($JenisKelamin, $Aktivitas_Fisik, $AMB);
        $EnergiPerhari = $Proses_Hitung_KebutuhanEnergiPerhari->nilai();
        // return $EnergiPerhari;

        //Menghitung Kebutuhan Energi per Waktu Makan
        $Proses_Hitung_KebutuhanEnergiPerWaktuMakan = new HitungKebutuhanEnergiPerWaktuMakan($EnergiPerhari);
        $EnergiPerWaktuMakan = $Proses_Hitung_KebutuhanEnergiPerWaktuMakan->nilai();
        return $EnergiPerWaktuMakan;

        //Kombinasi Menu Sesuai Jumlah Waktu Makan
        //Masih Pending, Next Proses Selanjutnya :D

        /*--------------------- Masuk Ke Proses TOPSIS ---------------------*/

        //Langkah 1 : Membangun decision matrix dan menentukan berat dari kriteria.
        $Proses_Hitung_DecisionMatrix = new HitungDecisionMatrix($EnergiPerhari);
        $DecisionMatrix = $Proses_Hitung_DecisionMatrix->nilai();
        // return $DecisionMatrix;


        //Contoh Kombinasi
        $Kombinasi = [];
        $Kombinasi[0] = array("Karbohidrat" => 247.9, "Protein" => 55.6, "Lemak" => 110);
        $Kombinasi[1] = array("Karbohidrat" => 220.7, "Protein" => 58.4, "Lemak" => 122.4);
        $Kombinasi[2] = array("Karbohidrat" => 299.5, "Protein" => 64.1, "Lemak" => 64.6);
        $Kombinasi[3] = array("Karbohidrat" => 301.2, "Protein" => 72.3, "Lemak" => 86.2);
        $Kombinasi[4] = array("Karbohidrat" => 285.5, "Protein" => 66.8, "Lemak" => 80.9);

        $JumlahData = count($Kombinasi);
        $variable = ["Karbohidrat", "Protein", "Lemak"];

        //Langkah 2 : Hitung decision matrix ternormalisasi
        $Proses_Hitung_DecisionMatrixTernormalisasi = new HitungDecisionMatrixTernormalisasi($Kombinasi, $JumlahData, $variable);
        $DecisionMatrixTernormalisasi = $Proses_Hitung_DecisionMatrixTernormalisasi->nilai();
        // return $DecisionMatrixTernormalisasi;


        //Langkah 3 : Hitung berat decision matrix ternormalisasi
        $Proses_Hitung_BeratDecisionMatrixTernormalisasi = new HitungBeratDecisionMatrixTernormalisasi($DecisionMatrix, $DecisionMatrixTernormalisasi, $JumlahData, $variable);
        $BeratDecisionMatrixTernormalisasi = $Proses_Hitung_BeratDecisionMatrixTernormalisasi->nilai();
        // return $BeratDecisionMatrixTernormalisasi;


        //Langkah 4 : Tentukan solusi ideal positif dan negatif
        $Proses_Hitung_SolusiIdealPositifNegatif = new HitungSolusiIdealPositifNegatif($BeratDecisionMatrixTernormalisasi, $variable);
        $SolusiIdealPositifNegatif = $Proses_Hitung_SolusiIdealPositifNegatif->nilai();
        // return $SolusiIdealPositifNegatif;

        //Langkah 5 : Hitung jarak dari solusi ideal positif dan solusi ideal negatif
        $Proses_Hitung_JarakSolusiIdealPositifNegatif = new HitungJarakSolusiIdealPositifNegatif($BeratDecisionMatrixTernormalisasi, $SolusiIdealPositifNegatif, $JumlahData, $variable);
        $JarakSolusiIdealPositifNegatif = $Proses_Hitung_JarakSolusiIdealPositifNegatif->nilai();
        // return $JarakSolusiIdealPositifNegatif;

        //Langkah 6 : Hitung kedekatan relatif dengan solusi ideal positif
        $Proses_Hitung_KedekatanRelatifSolusiIdeal = new HitungKedekatanRelatifSolusiIdeal($JarakSolusiIdealPositifNegatif, $JumlahData);
        $KedekatanRelatifSolusiIdeal = $Proses_Hitung_KedekatanRelatifSolusiIdeal->nilai();
        // return $KedekatanRelatifSolusiIdeal;

        //Langkah 7 : Urutkan alternatif yang memiliki nilai mendekati 1.
        $Proses_Hitung_UrutanAlternatif = new HitungUrutanAlternatif($KedekatanRelatifSolusiIdeal, $JumlahData);
        $UrutanAlternatif = $Proses_Hitung_UrutanAlternatif->nilai();
        return $UrutanAlternatif;

        //Galat Error Tetap


        //Hasil Akhir
        //Data Input
        //AKG
        //Plus-Minus
    }
}
