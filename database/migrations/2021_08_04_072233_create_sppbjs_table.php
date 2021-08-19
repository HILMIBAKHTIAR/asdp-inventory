<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateSppbjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppbjs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('ttd1');
            $table->unsignedBigInteger('ttd2');
            $table->unsignedBigInteger('ttd3');
            $table->unsignedBigInteger('ttd4');
            $table->unsignedBigInteger('mataanggaran_id');
            $table->string('nama_pengadaan');
            $table->date('tanggal_dibutuhkan');
            $table->integer('nomor_surat');
            $table->enum('klasifikasi', [
                'normal',
                'Emergency',
                'Urgent'
            ]);
            $table->string('catatan_peminta')->nullable();
            $table->string('catatan')->nullable();
            $table->string('catatan_anggaran')->nullable();
            $table->string('catatan_stok')->nullable();
            $table->timestamps();
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd1')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd2')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd3')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ttd4')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mataanggaran_id')->references('id')->on('mataanggarans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sppbjs');
    }
}
