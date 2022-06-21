<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuMakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_makanans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_menu');
            $table->integer('kalori');
            $table->integer('karbohidrat');
            $table->integer('protein');
            $table->integer('lemak');
            $table->integer('sajian')->nullable();
            $table->longText('komposisi');
            $table->longText('cara_masak');

            $table->foreignId('jenis_id')->constrained('jenis_makanans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_makanans');
    }
}
