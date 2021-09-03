<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verspm extends Model
{
    //
    protected $fillable = [
        'user_id',
        'sp2bj_id',
        'skb_id',
        'berita_id',
        'spm_id',
        'karyawan_id',
        'ttd1',
        'ttd2',
        'verifikator',
        'uraian_pekerjaan',
        'tahun_anggaran',
        'tanggal_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function sp2bj()
    {
        return $this->belongsTo(Sppbj::class, 'sp2bj_id', 'id');
    }

    public function skb()
    {
        return $this->belongsTo(Skb::class);
    }

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }

    public function spmId()
    {
        return $this->belongsTo(Spm::class);
    }

    public function verif()
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
    public function spm()
    {
        return $this->belongsTo(Spm::class);
    }
}
