<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'sppbj_id',
        'jumlah',
        'satuan',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
