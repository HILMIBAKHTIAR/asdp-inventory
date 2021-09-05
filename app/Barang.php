<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'sppbj_id',
        'jumlah',
        'satuan_id',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }
}
