<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangBeritaMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_berita_m_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beritam_id');
            $table->integer('jumlah');
            $table->enum('satuan', [
                'Roll',
                'Unit',
                'Pcs',
                'Pack',
                'Set',
                'Batang',
                'Lusin',
                'Botol',
                'Kotak',
                'Gross',
                'Rim',
                'Kodi',
                'Dus',
                'Bal',
                'Ls',
                'Meter',
                'Gram',
                'Cm',
                'M2',
                'M3',
                'Liter',
                'Kg',
                'Ton',
                'Ons',
                'Lembar',
                'Orang',
            ]);
            $table->string('nama_barang');
            $table->string('spesifikasi');
            $table->integer('harga_satuan');
            $table->timestamps();
            $table->foreign('beritam_id')->references('id')->on('berita_m_s')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_berita_m_s');
    }
}
