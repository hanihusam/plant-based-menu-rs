<?php

namespace App\Http\Controllers;

use App\Models\Penghitungan\HitungBBIdeal;
use App\Models\Penghitungan\HitungDecisionMatrix;
use App\Models\Penghitungan\HitungKebutuhanEnergiPerWaktuMakan;
use App\Models\Penghitungan\HitungTotalGiziRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{

    public function coba($id)
    {
        // return $id;
        return view('Pages.riwayat.riwayat-coba',);
    }

    public function index()
    {

        $DataDiri = DB::table('data_diris')
            ->join('rekomendasis', 'data_diris.id', '=', 'rekomendasis.dataDiri_id')
            ->select('data_diris.*', 'rekomendasis.kebutuhan_energi', 'rekomendasis.kombinasiMenu_id')
            ->get();
        // return $DataDiri;
        return view('Pages.riwayat.riwayat-index', [
            'DataDiri' => $DataDiri,
        ]);
    }

    public function detail($kombinasi)
    {
        // return view('Pages.riwayat.riwayat-coba');
        $dataInput = (array) DB::table('rekomendasis')
            ->join('data_diris', 'rekomendasis.dataDiri_id', '=', 'data_diris.id')
            ->where('data_diris.id', $kombinasi)
            ->first();
        // return $dataInput;

        $DaftarMenu = (array) DB::table('kombinasi_menus')
            ->join('rekomendasis', 'kombinasi_menus.id', '=', 'rekomendasis.kombinasiMenu_id')
            ->where('kombinasi_menus.id', $dataInput["kombinasiMenu_id"])
            ->first();
        // return $DaftarMenu;

        $HasilRekomendasi["Makan Pagi"] = (array) DB::table('menu_makanans')
            ->where('id', $DaftarMenu["makan_pagi"])
            ->first();
        $HasilRekomendasi["Snack 1"] = (array) DB::table('menu_makanans')
            ->where('id', $DaftarMenu["snack_1"])
            ->first();
        $HasilRekomendasi["Makan Siang"] = (array) DB::table('menu_makanans')
            ->where('id', $DaftarMenu["makan_siang"])
            ->first();
        $HasilRekomendasi["Snack 2"] = (array) DB::table('menu_makanans')
            ->where('id', $DaftarMenu["snack_2"])
            ->first();
        $HasilRekomendasi["Makan Malam"] = (array) DB::table('menu_makanans')
            ->where('id', $DaftarMenu["makan_malam"])
            ->first();


        //Menghitung Kebutuhan Energi per Waktu Makan
        $EnergiPerhari = $dataInput["kebutuhan_energi"];
        $Proses_Hitung_KebutuhanEnergiPerWaktuMakan = new HitungKebutuhanEnergiPerWaktuMakan($EnergiPerhari);
        $EnergiPerWaktuMakan = $Proses_Hitung_KebutuhanEnergiPerWaktuMakan->nilai();
        // return $EnergiPerWaktuMakan;

        //Langkah 1 : Membangun decision matrix dan menentukan berat dari kriteria.
        $Proses_Hitung_DecisionMatrix = new HitungDecisionMatrix($EnergiPerhari);
        $DecisionMatrix = $Proses_Hitung_DecisionMatrix->nilai();
        // return $DecisionMatrix;

        // $hasil = json_decode($HasilRekomendasi, true);
        // return dd($HasilRekomendasi);

        //Proses Tambahan Menhitung Total Kandungan Giji Hasil Rekomendasi
        $Proses_Hitung_TotalGiziRekomendasi = new HitungTotalGiziRekomendasi($HasilRekomendasi);
        $TotalGiziRekomendasi = $Proses_Hitung_TotalGiziRekomendasi->nilai();
        // return $TotalGiziRekomendasi;

        //Menghitung Berat Badan Ideal
        $Proses_Hitung_BBIdeal = new HitungBBIdeal($dataInput["tinggi_badan"]);
        $BBIdeal = $Proses_Hitung_BBIdeal->nilai();
        // return $BBIdeal;

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

        // return  $HasilRekomendasi;

        return view('Pages.riwayat.riwayat-detail', [
            // return view('Pages.riwayat.dashboard-hasil', [
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
        ]);
    }
}
