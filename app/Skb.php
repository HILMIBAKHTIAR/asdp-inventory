<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skb extends Model
{
    protected $fillable = [
        'user_id',
        'sp2bj_id',
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

    public function sp2bj()
    {
        return $this->belongsTo(Sppbj::class, 'sp2bj_id', 'id');
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
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
