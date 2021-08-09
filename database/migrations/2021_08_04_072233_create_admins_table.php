<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->string('mata_anggaran');
            $table->string('nama_pengadaan');
            $table->date('tanggal_dibutuhkan');
            $table->string('catatan_peminta')->nullable();
            $table->string('catatan')->nullable();
            $table->string('catatan_anggaran')->nullable();
            $table->string('catatan_stok')->nullable();
            $table->timestamps();
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
