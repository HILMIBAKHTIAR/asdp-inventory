<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spm extends Model
{
    //
    protected $fillable = [
        'user_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'devisi',
        'tanggal',
        'tahun_anggaran',
        'jenis_transaksi',
        'program',
        'penerima_dana',
        'nomor_rekening',
        'bank',
        'nomor_surat_spm'
    ];



    public function user()
    {
        return $this->belongsTo('App/User');
    }

    public function itemspm()
    {
        return $this->hasMany(ItemSpm::class);
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

    public function tanda3()
    {
        return $this->belongsTo(Karyawan::class, 'ttd3', 'id');
    }
}
