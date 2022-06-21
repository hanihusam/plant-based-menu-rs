<?php

namespace App\Models\Penghitungan;

use App\Models\MenuMakanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuatMenu
{
    public function __construct($EnergiPerWaktuMakan)
    {
        $this->MenuUtama = MenuMakanan::query()
            ->where('jenis_id', '=', 1)
            ->get();

        $this->Camilan = MenuMakanan::query()
            ->where('jenis_id', '=', 2)
            ->get();

        $this->EnergiPerWaktuMakan = $EnergiPerWaktuMakan;
        $this->EnergiMinimum = $EnergiPerWaktuMakan["Minimal"];
        $this->EnergiMaksimum = $EnergiPerWaktuMakan["Maksimal"];
        $this->WaktuMakan = array_keys($EnergiPerWaktuMakan["Normal"]);

        $this->JumlahMenuUtama = count($this->MenuUtama);
        $this->JumlahCamilan = count($this->Camilan);
        $this->JumlahMenu = 10;
    }

    public function RancangMenuUtama($min, $max)
    {
        //Melakukan Filter Menu Sesuai Nilai Min-Max
        $i = 0;

        for ($j = 0; $j < $this->JumlahMenuUtama; $j++) {
            if ($this->MenuUtama[$j]["kalori"] > $min && $this->MenuUtama[$j]["kalori"] < $max) {
                $Menu[$i]["id"] = $this->MenuUtama[$j]["id"];
                $Menu[$i]["nama_menu"] = $this->MenuUtama[$j]["nama_menu"];
                $Menu[$i]["kalori"] = $this->MenuUtama[$j]["kalori"];
                $Menu[$i]["karbohidrat"] = $this->MenuUtama[$j]["karbohidrat"];
                $Menu[$i]["protein"] = $this->MenuUtama[$j]["protein"];
                $Menu[$i]["lemak"] = $this->MenuUtama[$j]["lemak"];
                $Menu[$i]["sajian"] = $this->MenuUtama[$j]["sajian"];
                $Menu[$i]["komposisi"] = $this->MenuUtama[$j]["komposisi"];
                $Menu[$i]["cara_masak"] = $this->MenuUtama[$j]["cara_masak"];
                $Menu[$i]["jenis_id"] = $this->MenuUtama[$j]["jenis_id"];

                $i++;
            }
        }
        if (empty($Menu)) {
            return "kosong";
        } else {
            $MenuRandom = array_rand($Menu);
            return $Menu[$MenuRandom];
        }
    }

    public function RancangCamilan($min, $max)
    {
        //Melakukan Filter Menu Sesuai Nilai Min-Max
        $i = 0;

        for ($j = 0; $j < $this->JumlahCamilan; $j++) {
            if ($this->Camilan[$j]["kalori"] > $min && $this->Camilan[$j]["kalori"] < $max) {
                $Menu[$i]["id"] = $this->Camilan[$j]["id"];
                $Menu[$i]["nama_menu"] = $this->Camilan[$j]["nama_menu"];
                $Menu[$i]["kalori"] = $this->Camilan[$j]["kalori"];
                $Menu[$i]["karbohidrat"] = $this->Camilan[$j]["karbohidrat"];
                $Menu[$i]["protein"] = $this->Camilan[$j]["protein"];
                $Menu[$i]["lemak"] = $this->Camilan[$j]["lemak"];
                $Menu[$i]["sajian"] = $this->Camilan[$j]["sajian"];
                $Menu[$i]["komposisi"] = $this->Camilan[$j]["komposisi"];
                $Menu[$i]["cara_masak"] = $this->Camilan[$j]["cara_masak"];
                $Menu[$i]["jenis_id"] = $this->Camilan[$j]["jenis_id"];

                $i++;
            }
        }
        if (empty($Menu)) {
            return "kosong";
        } else {
            $MenuRandom = array_rand($Menu);
            return $Menu[$MenuRandom];
        }
    }

    public function RancangMenu()
    {
        for ($i = 0; $i < $this->JumlahMenu; $i++) {
            //Filtering Menu Makan Pagi
            $this->KombinasiMenu[$i]["Makan Pagi"] = $this->RancangMenuUtama($this->EnergiMinimum["Makan Pagi"], $this->EnergiMaksimum["Makan Pagi"]);

            //Filtering Menu Snack 1
            $this->KombinasiMenu[$i]["Snack 1"] = $this->RancangCamilan($this->EnergiMinimum["Snack 1"], $this->EnergiMaksimum["Snack 1"]);

            //Filtering Menu Makan Siang
            $this->KombinasiMenu[$i]["Makan Siang"] = $this->RancangMenuUtama($this->EnergiMinimum["Makan Siang"], $this->EnergiMaksimum["Makan Siang"]);

            //Filtering Menu Snack 2
            $this->KombinasiMenu[$i]["Snack 2"] = $this->RancangCamilan($this->EnergiMinimum["Snack 2"], $this->EnergiMaksimum["Snack 2"]);

            //Filtering Menu Makan Malam
            $this->KombinasiMenu[$i]["Makan Malam"] = $this->RancangMenuUtama($this->EnergiMinimum["Makan Malam"], $this->EnergiMaksimum["Makan Malam"]);
        }
    }

    public function nilai()
    {
        $this->RancangMenu();
        return $this->KombinasiMenu;
    }
}
