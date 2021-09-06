<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangSkbMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_skb_m_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skbm_id');
            $table->integer('jumlah');
            $table->unsignedBigInteger('satuan_id');
            $table->string('nama_barang');
            $table->string('spesifikasi');
            $table->integer('harga_satuan');
            $table->timestamps();
            $table->foreign('skbm_id')->references('id')->on('skb_m_s')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('barang_skb_m_s');
    }
}
