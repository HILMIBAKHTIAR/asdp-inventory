<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sppbj extends Model
{
    //
    protected $fillable = [
        'karyawan_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'ttd4',
        'mataanggaran_id',
        'nama_pengadaan',
        'tanggal_dibutuhkan',
        'catatan_peminta',
        'catatan',
        'catatan_anggaran',
        'catatan_stok',

    ];

    // Untuk Tabel Barang
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    // Untuk Tabel Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
    public function tanda1()
    {
        return $this->belongsTo(Karyawan::class, 'ttd1', 'id');
    }
    public function tanda2()
    {
        return $this->belongsTo(Karyawan::class, 'ttd2', 'id');
    }
    public function tanda3()
    {
        return $this->belongsTo(Karyawan::class, 'ttd3', 'id');
    }
    public function tanda4()
    {
        return $this->belongsTo(Karyawan::class, 'ttd4', 'id');
    }

    // Untuk Tabel Mata Anggaran
    public function mataanggaran()
    {
        return $this->belongsTo(Mataanggaran::class, 'mataanggaran_id', 'id');
    }
}
