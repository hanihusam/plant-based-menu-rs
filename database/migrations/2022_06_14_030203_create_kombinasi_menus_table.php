<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKombinasiMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kombinasi_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('makan_pagi')->constrained('menu_makanans');
            $table->foreignId('snack_1')->constrained('menu_makanans');
            $table->foreignId('makan_siang')->constrained('menu_makanans');
            $table->foreignId('snack_2')->constrained('menu_makanans');
            $table->foreignId('makan_malam')->constrained('menu_makanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kombinasi_menus');
    }
}
