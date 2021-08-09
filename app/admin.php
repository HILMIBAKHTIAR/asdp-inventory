<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $fillable = [
        'karyawan_id',
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
    public function karyawan()
    {
        return $this->belongsTo('App\karyawan');
    }
}
