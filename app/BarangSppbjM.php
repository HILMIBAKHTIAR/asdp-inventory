<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangSppbjM extends Model
{
    //
    protected $fillable = [
        'sppbjm_id',
        'jumlah',
        'satuan',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];
}
