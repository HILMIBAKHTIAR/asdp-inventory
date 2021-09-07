<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpmMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spm_m_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('nomor_surat_spm');
            $table->date('tanggal_surat');
            $table->string('jenis_transaksi');
            $table->string('program')->nullable();
            $table->date('tahun_anggaran');
            $table->unsignedBigInteger('divisi_id');


            $table->string('uraian_kegiatan');
            $table->unsignedBigInteger('mataanggaran_id');
            $table->string('permohonan_dana');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('pembebanan_anggaran');

            $table->string('penerima_dana')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('bank')->nullable();

            $table->unsignedBigInteger('ttd1');
            $table->unsignedBigInteger('ttd2');
            $table->unsignedBigInteger('ttd3');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mataanggaran_id')->references('id')->on('mataanggarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pembebanan_anggaran')->references('id')->on('mataanggarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd1')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd2')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd3')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('spm_m_s');
    }
}
