<?php

namespace App\Http\Controllers;

use App\Models\DataDiri;
use App\Models\KombinasiMenu;
use App\Models\MenuMakanan;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

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
use App\Models\Penghitungan\BuatMenu;
use App\Models\Penghitungan\KonversiKombinasi;
use App\Models\Penghitungan\HitungTotalGiziRekomendasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Pages.dashboard.dashboard-index');
    }

    public function hasil()
    {
        return view('Pages.dashboard.dashboard-hasil');
    }

    public function hπasilKosong()
    {
        return view('Pages.dashboard.dashboard-hasil-kosong');
    }

    public function Penyimpanan($dataInput, $EnergiPerhari, $HasilRekomendasi)
    {
        // Menyimpan Data Pribadi
        $DataDiri = DataDiri::create([
            'jenis_kelamin' => $dataInput["jenis_kelamin"],
            'tinggi_badan' => $dataInput["tinggi_badan"],
            'berat_badan' => $dataInput["berat_badan"],
            'umur' => $dataInput["umur"],
            'aktivitas_fisik' => $dataInput["aktivitas_fisik"],
            'user_id' => Auth::user()->id,
        ]);

        // Menyimpan Kombinasi Menu
        $KombinasiMenu = KombinasiMenu::create([
            'makan_pagi' => $HasilRekomendasi["Makan Pagi"]["id"],
            'snack_1' => $HasilRekomendasi["Snack 1"]["id"],
            'makan_siang' => $HasilRekomendasi["Makan Siang"]["id"],
            'snack_2' => $HasilRekomendasi["Snack 2"]["id"],
            'makan_malam' => $HasilRekomendasi["Makan Malam"]["id"],
        ]);

        $Rekomendasi = Rekomendasi::create([
            'kebutuhan_energi' => $EnergiPerhari,
            'dataDiri_id' => $DataDiri->id,
            'kombinasiMenu_id' => $KombinasiMenu->id,
        ]);
    }

    public function Penghitungan(Request $request)
    {
        // Mengambil Data Pribadi
        $dataInput = $request->all();

        //Mendeklarasikan Data Pribadi Untuk Penghitungan
        $JenisKelamin = $dataInput["jenis_kelamin"];
        $TinggiBadan = $dataInput["tinggi_badan"];
        $Umur = $dataInput["umur"];
        $Aktivitas_Fisik = $dataInput["aktivitas_fisik"];


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
        // return $EnergiPerWaktuMakan;

        //Kombinasi Menu Sesuai Jumlah Waktu Makan
        $Proses_Buat_Menu = new BuatMenu($EnergiPerWaktuMakan);
        $DaftarMenuMakanan = $Proses_Buat_Menu->nilai();
        // return $DaftarMenuMakanan;

        if (
            $DaftarMenuMakanan[0]["Makan Pagi"] == "kosong" ||
            $DaftarMenuMakanan[0]["Snack 1"] == "kosong" ||
            $DaftarMenuMakanan[0]["Makan Siang"] == "kosong" ||
            $DaftarMenuMakanan[0]["Snack 2"] == "kosong" ||
            $DaftarMenuMakanan[0]["Makan Malam"] == "kosong"
        ) {
            return view('Pages.dashboard.dashboard-hasil-kosong', [
                'dataInput' => $dataInput,
                'EnergiPerWaktuMakan' => $EnergiPerWaktuMakan,
                'EnergiPerhari' => $EnergiPerhari,
                'BBIdeal' => $BBIdeal,
            ]);
        }

        //Konversi Kombinasi Menu Kedalam Nilai Karbohidrat-Protein-Lemak
        $variable = ["karbohidrat", "protein", "lemak"];
        $Proses_Konversi_Kombinasi = new KonversiKombinasi($DaftarMenuMakanan, $variable);
        $Kombinasi = $Proses_Konversi_Kombinasi->nilai();
        $JumlahData = count($Kombinasi);
        // return $Kombinasi;


        /*--------------------- Masuk Ke Proses TOPSIS ---------------------*/

        //Langkah 1 : Membangun decision matrix dan menentukan berat dari kriteria.
        $Proses_Hitung_DecisionMatrix = new HitungDecisionMatrix($EnergiPerhari);
        $DecisionMatrix = $Proses_Hitung_DecisionMatrix->nilai();
        // return $DecisionMatrix;

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
        $HasilRekomendasi = $DaftarMenuMakanan[$UrutanAlternatif];
        // return $HasilRekomendasi;



        /*--------------------- Proses Tambahan ---------------------*/

        // return $HasilRekomendasi["Makan Pagi"];
        //Proses Tambahan Menhitung Total Kandungan Giji Hasil Rekomendasi
        $Proses_Hitung_TotalGiziRekomendasi = new HitungTotalGiziRekomendasi($HasilRekomendasi);
        $TotalGiziRekomendasi = $Proses_Hitung_TotalGiziRekomendasi->nilai();
        // return $TotalGiziRekomendasi;


        //Menghitung Kebutuhan Energi Perhari Maksimal
        $EnergiPerhariMaksimal = $EnergiPerhari * 1.20;
        $Proses_Hitung_DecisionMatrix = new HitungDecisionMatrix($EnergiPerhariMaksimal);
        $DecisionMatrixMaksimal = $Proses_Hitung_DecisionMatrix->nilai();
        // return $DecisionMatrixMaksimal;

        //Menghitung Kebutuhan Energi Perhari Minimal
        $EnergiPerhariMinimal = $EnergiPerhari * 0.80;
        $Proses_Hitung_DecisionMatrix = new HitungDecisionMatrix($EnergiPerhariMinimal);
        $DecisionMatrixMinimal = $Proses_Hitung_DecisionMatrix->nilai();
        // return $DecisionMatrixMinimal;

        //Penyimpanan Data
        // return $UrutanAlternatif;

        $WaktuMakan = [
            "Makan Pagi" => "Breakfast",
            "Snack 1" => "Snack 1",
            "Makan Siang" => "Lunch",
            "Snack 2" => "Snack 2",
            "Makan Malam" => "Dinner",
        ];
        // $WaktuMakan = array_keys($EnergiPerWaktuMakan["Normal"]);

        // return dd($WaktuMakan);

        $this->Penyimpanan($dataInput, $EnergiPerhari, $HasilRekomendasi);

        return view('Pages.dashboard.dashboard-hasil', [
            'HasilRekomendasi' => $HasilRekomendasi,
            'dataInput' => $dataInput,
            'EnergiPerWaktuMakan' => $EnergiPerWaktuMakan,
            'EnergiPerhari' => $EnergiPerhari,
            'DecisionMatrix' => $DecisionMatrix,
            'TotalGiziRekomendasi' => $TotalGiziRekomendasi,
            'BBIdeal' => $BBIdeal,

            'EnergiPerhariMaksimal' => $EnergiPerhariMaksimal,
            'DecisionMatrixMaksimal' => $DecisionMatrixMaksimal,

            'EnergiPerhariMinimal' => $EnergiPerhariMinimal,
            'DecisionMatrixMinimal' => $DecisionMatrixMinimal,

            //Untuk Keperluan Riwayat Penghitungan
            'AMB' => $AMB,
            'DaftarMenuMakanan' => $DaftarMenuMakanan,
            'Kombinasi' => $Kombinasi,
            'DecisionMatrixTernormalisasi' => $DecisionMatrixTernormalisasi,
            'JumlahData' => $JumlahData,
            'BeratDecisionMatrixTernormalisasi' => $BeratDecisionMatrixTernormalisasi,
            'SolusiIdealPositifNegatif' => $SolusiIdealPositifNegatif,
            'JarakSolusiIdealPositifNegatif' => $JarakSolusiIdealPositifNegatif,
            'KedekatanRelatifSolusiIdeal' => $KedekatanRelatifSolusiIdeal,
            'UrutanAlternatif' => $UrutanAlternatif,
            'WaktuMakan' => $WaktuMakan,


        ]);
    }
}
