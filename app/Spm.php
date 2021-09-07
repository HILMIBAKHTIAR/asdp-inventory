<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spm extends Model
{
    //
    protected $fillable = [
        'user_id',
        'sppbj_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'divisi_id',
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
        return $this->belongsTo(User::class);
    }

    public function sppbj()
    {
        return $this->belongsTo(Sppbj::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
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
