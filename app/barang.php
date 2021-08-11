<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $fillable = [
        'admin_id',
        'jumlah',
        'satuan',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];

}
