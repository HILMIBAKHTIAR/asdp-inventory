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
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,);
    }
}
