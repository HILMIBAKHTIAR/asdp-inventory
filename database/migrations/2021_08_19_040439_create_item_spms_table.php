<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSpmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_spms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spm_id')->nullable();
            $table->unsignedBigInteger('mataanggaran_item_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('uraian_kegiatan')->nullable();
            $table->bigInteger('dana')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('spm_id')->references('id')->on('spms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mataanggaran_item_id')->references('id')->on('mataanggarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_spms');
    }
}
