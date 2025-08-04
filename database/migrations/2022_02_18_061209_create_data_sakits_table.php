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
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('tensi')->nullable();
            $table->string('suhu')->nullable();
            $table->string('nadi')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('spo2')->nullable();
            $table->string('alergi')->nullable();
            $table->string('perkiraan_penyakit')->nullable();
            $table->enum('status_pasien', ['Belum Rawat', 'Rawat Jalan', 'Rawat Inap', 'Dirujuk', 'Sembuh', 'Batal Rawat']);
            $table->foreignId('id_petugas')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_pasien')->constrained('pasien')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_obat')->constrained('obat')->onUpdate('cascade')->onDelete('cascade');
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
