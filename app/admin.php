<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $fillable = [
        'ttd1',
        'ttd2',
        'ttd3',
        'ttd4',
        'ttd5',
        'mata_anggaran',
        'nama_pengadaan',
        'tanggal_dibutuhkan',
        'catatan_peminta',
        'catatan',
        'catatan_anggaran',
        'catatan_stok',

    ];

    public function barang()
    {
        return $this->hasMany(barang::class);
    }
    public function tanda1()
    {
        return $this->belongsTo(Karyawan::class, 'ttd1', 'id');
    }
    public function tanda2()
    {
        return $this->belongsTo(Karyawan::class, 'ttd2', 'id');
    }
    public function ttd3()
    {
        return $this->belongsTo(Karyawan::class, 'ttd3', 'id');
    }
    public function ttd4()
    {
        return $this->belongsTo(Karyawan::class, 'ttd4', 'id');
    }
    public function ttd5()
    {
        return $this->belongsTo(Karyawan::class, 'ttd5', 'id');
    }
}
