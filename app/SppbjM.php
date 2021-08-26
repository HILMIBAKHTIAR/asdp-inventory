<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SppbjM extends Model
{
    //
    protected $fillable = [
        'user_id',
        'karyawan_id',
        'ttd1',
        'ttd2',
        'ttd3',
        'ttd4',
        'mataanggaran_id',
        'nama_pengadaan',
        'tanggal_surat',
        'nomor_surat',
        'bulan_dibutuhkan',
        'catatan_peminta',
        'catatan',
        'catatan_anggaran',
        'catatan_stok',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Untuk Tabel Barang
    public function barangSp2bj()
    {
        return $this->hasMany(BarangSppbjM::class);
    }
    // Untuk Tabel Karyawan
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
    public function tanda4()
    {
        return $this->belongsTo(Karyawan::class, 'ttd4', 'id');
    }

    // Untuk Tabel Mata Anggaran
    public function mataanggaran()
    {
        return $this->belongsTo(Mataanggaran::class);
    }
}
