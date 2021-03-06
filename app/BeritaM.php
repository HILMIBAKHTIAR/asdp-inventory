<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaM extends Model
{
    //
    protected $fillable = [
        'user_id',
        'karyawan_berita_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'alamat_tujuan',
        'nomor_surat_berita',
        'tanggal_surat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barangBerita()
    {
        return $this->hasMany(BarangBeritaM::class, 'beritam_id', 'id');
    }

    public function karyawanBerita()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_berita_id', 'id');
    }
    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
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
