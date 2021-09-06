<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangSppbjM extends Model
{
    protected $fillable = [
        'sppbjm_id',
        'jumlah',
        'satuan_id',
        'nama_barang',
        'spesifikasi',
        'harga_satuan',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }
}
