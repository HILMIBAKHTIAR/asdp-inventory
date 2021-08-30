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
        'usia',
        'tanggal_lahir',
        'tempat_lahir',
    ];
}
