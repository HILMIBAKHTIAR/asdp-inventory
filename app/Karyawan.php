<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama_karyawan',
        'jabatan',
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
    ];
}
