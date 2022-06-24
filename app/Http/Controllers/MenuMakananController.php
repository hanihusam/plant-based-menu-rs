<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use App\Imports\MenuMakananImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\MenuMakanan;

class MenuMakananController extends Controller
{
    public function detail()
    {
        // $MenuMakanan = MenuMakanan::all();
        return view('Pages.dataMenu.dataMenu-detail');
    }
    public function index()
    {
        $MenuMakanan = MenuMakanan::all();
        return view('Pages.dataMenu.dataMenu-index', compact('MenuMakanan'));
    }
    public function import_excel(Request $request)
    {

        // validasi
        $this->validate($request, [
            'file' => 'required'
        ]);
        // return "OKs";

        // menangkap file excel
        $file = $request->file('file');

        // import data
        Excel::import(new MenuMakananImport, $file);

        session()->flash('message', 'Data Imported Successfully');

        return redirect()->route('dataMenu');
    }
}
