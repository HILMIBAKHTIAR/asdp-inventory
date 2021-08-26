<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkbM extends Model
{
    //
    protected $fillable = [
        'user_id',
        'karyawan_id',
        'alamat_tujuan',
        'no_telp',
        'tanggal_surat',
        'ttd1',
        'ttd2'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function barangSkbm()
    {
        return $this->hasMany(BarangSkbM::class);
    }

    public function tanda1()
    {
        return $this->belongsTo(Karyawan::class, 'ttd1', 'id');
    }

    public function tanda2()
    {
        return $this->belongsTo(Karyawan::class, 'ttd2', 'id');
    }
}
