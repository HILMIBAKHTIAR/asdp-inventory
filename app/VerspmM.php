<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerspmM extends Model
{
    //
    protected $fillable = [
        'user_id',
        'karyawan_id',
        'ttd1',
        'ttd2',
        'devisi',
        'verifikator',
        'uraian_pekerjaan',
        'tahun_anggaran',
        'tanggal_surat',
    ];

    public function user() 
    {
        return $this->belongsTo('App/User');
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
    public function verifikator()
    {
        return $this->belongsTo(Karyawan::class, 'verifikator', 'id');
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
