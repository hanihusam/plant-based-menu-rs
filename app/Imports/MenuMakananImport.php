<?php

namespace App\Imports;

use App\Models\MenuMakanan;
use Maatwebsite\Excel\Concerns\ToModel;

class MenuMakananImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MenuMakanan([
            'id'            => $row[0],
            'jenis_id'      => $row[1],
            'nama_menu'     => $row[2],
            'kalori'        => $row[3],
            'karbohidrat'   => $row[4],
            'protein'       => $row[5],
            'lemak'         => $row[6],
            'sajian'        => $row[7],
            'komposisi'     => $row[8],
            'cara_masak'    => $row[9],
        ]);
    }
}
