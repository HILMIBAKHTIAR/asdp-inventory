<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerspmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verspms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sp2bj_id');
            $table->unsignedBigInteger('skb_id')->nullable();
            $table->unsignedBigInteger('berita_id');
            $table->unsignedBigInteger('spm_id');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('verifikator');
            $table->unsignedBigInteger('ttd1');
            $table->unsignedBigInteger('ttd2');
            $table->string('uraian_pekerjaan');
            $table->date('tahun_anggaran');
            $table->date('tanggal_surat');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('verifikator')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd1')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd2')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sp2bj_id')->references('id')->on('sppbjs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('skb_id')->references('id')->on('skbs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('berita_id')->references('id')->on('beritas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('spm_id')->references('id')->on('spms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verspms');
    }
}
