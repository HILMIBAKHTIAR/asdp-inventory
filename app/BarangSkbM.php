<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangSkbM extends Model
{
    protected $fillable = [
        'skbm_id',
        'jumlah',
        'satuan',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];
}
