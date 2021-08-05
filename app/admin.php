<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $fillable = [
        'dari',
        'mata_anggaran',
        'nama_pengadaan',
        'tanggal_dibutuhkan',
    ];
}
