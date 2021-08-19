<?php

use App\admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sppbj_id');
            $table->integer('jumlah');
            $table->enum('satuan', [
                'roll',
                'unit',
                'pcs',
            ]);
            $table->string('nama_barang');
            $table->string('spesifikasi');
            $table->integer('harga_satuan');
            $table->timestamps();
            $table->foreign('sppbj_id')->references('id')->on('sppbjs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
