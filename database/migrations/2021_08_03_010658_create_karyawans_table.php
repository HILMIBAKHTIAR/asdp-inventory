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
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('usia');
            $table->enum('status_keluarga', [
                'K/0',
                'K/1',
                'K/2',
                'K/3',
                'K/4'
            ]);
            $table->date('tanggal_masuk_kerja');
            $table->string('masa_kerja');
            $table->string('sk');
            $table->enum('jabatan', ['Manager SDM & Umum', 'Manager Usaha Ketapang', 'Manager Usaha Gilimanuk', 'Manager Keuangan', 'Manager Teknik', 'Staf SDM & Umum', 'Verifikator', 'Staf Teknik Ketapang', 'Staf Usaha']);
            $table->date('tanggal_pilih_jabatan');
            $table->string('masa_jabatan');
            $table->enum('pendidikan', [
                'SD',
                'SMP',
                'SMA',
                'D3',
                'D4',
                'S1',
                'S2',
                'S3',
            ]);
            $table->string('jurusan');
            $table->string('nik_ktp');
            $table->string('no_bpjs_ketenagakerjaan');
            $table->string('no_bpjs_kesehatan');
            $table->string('no_npwp');
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
