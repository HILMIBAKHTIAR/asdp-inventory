<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerspmMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verspm_m_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('verifikator');
            $table->enum('devisi', [
                'SDM & Umum',
                'Usaha',
                'Teknik',
                'Teknik Ketapang',
                'Keuangan',
            ]);
            $table->unsignedBigInteger('ttd1');
            $table->unsignedBigInteger('ttd2');
            $table->string('uraian_pekerjaan');
            $table->year('tahun_anggaran');
            $table->date('tanggal_surat');

            $table->date('tanggal_skb')->nullable();
            $table->date('tanggal_sppbj');
            $table->date('tanggal_berita_acara');
            $table->integer('jumlah_harga_skb')->nullable();
            $table->integer('jumlah_harga_berita');
            $table->integer('jumlah_harga_sppbj');
            $table->integer('no_sppbj');
            $table->integer('no_berita');


            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('verifikator')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd1')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd2')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verspm_m_s');
    }
}
