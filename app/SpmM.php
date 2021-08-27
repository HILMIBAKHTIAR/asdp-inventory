<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpmM extends Model
{
    //
    protected $fillable = [
        'user_id',
        'nomor_surat_spm',
        'tanggal_surat',
        'jenis_transaksi',
        'program',
        'tahun_anggaran',
        'devisi',

        'uraian_kegiatan',
        'mataanggaran_id',
        'permohonan_dana',
        'keterangan',

        'penerima_dana',
        'nomor_rekening',
        'bank',

        'ttd1',
        'ttd2',
        'ttd3',
    ];



    public function user()
    {
        return $this->belongsTo('App/User');
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function mataanggaran()
    {
        return $this->belongsTo(Mataanggaran::class);
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
