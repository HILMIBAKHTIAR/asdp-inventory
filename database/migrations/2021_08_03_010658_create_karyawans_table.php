<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->enum('jabatan', ['Manager SDM & Umum', 'Manager Usaha Ketapang', 'Manager Usaha Gilimanuk', 'Manager Keuangan', 'Manager Teknik', 'Staf SDM & Umum', 'Verifikator', 'Staf Teknik Ketapang', 'Staf Usaha']);
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('nik');
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
        Schema::dropIfExists('karyawans');
    }
}
