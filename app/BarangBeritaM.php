<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangBeritaM extends Model
{
    //
    protected $fillable = [
        'beritam_id',
        'jumlah',
        'satuan',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];
}
