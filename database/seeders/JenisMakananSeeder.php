<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisMakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_makanans')->insert([
            ['jenis' => 'Menu Utama'],
            ['jenis' => 'Camilan']

        ]);
    }
}
