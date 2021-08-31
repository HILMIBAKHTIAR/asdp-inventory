<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('karyawan_berita_id');
            $table->unsignedBigInteger('sppbj_id');
            $table->unsignedBigInteger('ttd1');
            $table->unsignedBigInteger('ttd2');
            $table->unsignedBigInteger('ttd3');
            $table->string('alamat_tujuan');
            $table->date('tanggal_surat');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('karyawan_berita_id')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sppbj_id')->references('id')->on('sppbjs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd1')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd2')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd3')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('beritas');
    }
}
