<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangSppbjMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_sppbj_m_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sppbjm_id');
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->integer('jumlah');
            $table->string('nama_barang');
            $table->string('spesifikasi');
            $table->integer('harga_satuan');
            $table->timestamps();
            $table->foreign('sppbjm_id')->references('id')->on('sppbj_m_s')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_sppbj_m_s');
    }
}
