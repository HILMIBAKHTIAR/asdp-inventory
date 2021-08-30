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
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('usia');
            $table->string('nik_ktp');
            $table->string('no_bpjs_kesehatan');
            $table->string('no_bpjs_ketenagakerjaan');
            $table->string('no_npwp');
            $table->string('status_kelurga');
            $table->string('pendidikan');
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
