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
            $table->unsignedBigInteger('mataanggaran_id');
            $table->unsignedBigInteger('ttd1');
            $table->unsignedBigInteger('ttd2');
            $table->unsignedBigInteger('ttd3');
            $table->enum('devisi', [
                'SDM & Umum',
                'Usaha',
                'Teknik',
                'Teknik Ketapang',
                'Keuangan',
            ]);
            $table->date('tanggal');
            $table->date('tahun_anggaran');
            $table->string('jenis_transaksi');
            $table->string('program')->nullable();
            $table->string('penerima_dana')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('bank')->nullable();
            $table->integer('nomor_surat_spm');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd1')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd2')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd3')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
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
