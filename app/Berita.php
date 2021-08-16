<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'user_id',
        'karyawan_berita_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'alamat_tujuan'
    ];

    public function user()
    {
        return $this->belongsTo('App/User');
    }

    // public function barangBerita()
    // {
    //     return $this->hasMany(BarangSerahTerima::class);
    // }

    public function karyawan()
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
