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
            $table->string('nik');
            $table->string('nama_karyawan');
            $table->enum('darat_laut', [
                'Darat',
                'Laut'
            ]);
            $table->enum('jenis_kelamin', [
                'P',
                'L'
            ]);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('usia');
            $table->enum('status_keluarga', [
                'K/0',
                'K/1',
                'K/2',
                'K/3',
                'K/4',
                'TK/0',
                'TK/1',
                'TK/2',
                'TK/3',
                'TK/4',
            ]);
            $table->date('tanggal_masuk_kerja');
            $table->string('masa_kerja');
            $table->string('sk')->nullable();
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('divisi_id');
            $table->unsignedBigInteger('status_jabatan');
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
                'ANT I',
                'ANT II',
                'ANT III',
                'ANT IV',
                'ANT V',
                'ANT D',
                'ATT I',
                'ATT II',
                'ATT III',
                'ATT IV',
                'ATT V',
                'ATT D',
            ]);
            $table->string('jurusan')->nullable();
            $table->string('nik_ktp')->nullable();
            $table->string('no_bpjs_ketenagakerjaan')->nullable();
            $table->string('no_bpjs_kesehatan')->nullable();
            $table->string('no_npwp');
            $table->enum('segmen', [
                'Kantor Gilimanuk',
                'Kantor Ketapang',
                'Ops Gilimanuk',
                'Ops Ketapang',
                'Pratitha',
            ]);
            $table->string('gol_skala_tht')->nullable();
            $table->string('skala_tht')->nullable();
            $table->string('gol_phdp')->nullable();
            $table->string('gol_skala_phdp')->nullable();
            $table->string('gol_gaji')->nullable();
            $table->string('gol_skala_gaji')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_inhealth')->nullable();
            $table->string('no_rek');
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('uk_sepatu')->nullable();
            $table->string('uk_kaos')->nullable();
            $table->timestamps();
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_jabatan')->references('id')->on('jabatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('divisi_id')->references('id')->on('divisis')->onDelete('cascade')->onUpdate('cascade');
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
