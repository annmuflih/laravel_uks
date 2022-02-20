<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sakit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_petugas');
            $table->foreignId('id_pasien');
            $table->string('keluhan');
            $table->string('tindakan');
            $table->enum('kategori_penyakit', ['Pencernaan', 'Pernafasan','Kulit','THT','Gigi & Mulut','Infeksi','Cedera & Luka','Lainnya']);
            $table->enum('status_pasien', ['Rawat', 'Rawat Jalan','Dirujuk','Sembuh']);
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
        Schema::dropIfExists('data_sakit');
    }
}
