<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'user_id',
        'karyawan_berita_id',
        'sppbj_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'alamat_tujuan',
        'tanggal_surat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sppbj()
    {
        return $this->belongsTo(Sppbj::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function karyawanBerita()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_berita_id', 'id');
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
}
