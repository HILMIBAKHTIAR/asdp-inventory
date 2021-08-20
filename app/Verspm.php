<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verspm extends Model
{
    //
    protected $fillable = [
        'user_id',
        'karyawan_id',
        'ttd1',
        'ttd2',
        'nama',
        'jenis_pekerjaan',
        'uraian_pekerjaan',
        'tahun_anggaran',
    ];

    public function user() 
    {
        return $this->belongsTo('App/User');
    }
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
    public function spm()
    {
        return $this->belongsTo(Spm::class);
    }


}
