<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_karyawan',
        'jabatan_id',
        'status_jabatan',
        'divisi_id',
        'nik',
        'nik_ktp',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan',
        'no_npwp',
        'status_keluarga',
        'pendidikan',
        'tanggal_lahir',
        'tempat_lahir',
        'sk',
        'usia',
        'tanggal_masuk_kerja',
        'tanggal_pilih_jabatan',
        'masa_jabatan',
        'masa_kerja',
        'jurusan',
        'darat_laut',
        'jenis_kelamin',
        'segmen',
        'gol_skala_tht',
        'skala_tht',
        'gol_phdp',
        'gol_skala_phdp',
        'gol_gaji',
        'gol_skala_gaji',
        'no_hp',
        'no_inhealth',
        'no_rek',
        'email',
        'alamat',
        'uk_sepatu',
        'uk_kaos',

    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function status()
    {
        return $this->belongsTo(Jabatan::class, 'status_jabatan', 'id');
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
