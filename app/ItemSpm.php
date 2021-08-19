<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSpm extends Model
{
    protected $fillable = [
        'spm_id',
        'mataanggaran_item_id',
        'uraian_kegiatan',
        'dana',
        'keterangan',
    ];

    public function mataanggaran()
    {
        return $this->belongsTo(Mataanggaran::class, 'mataanggaran_item_id', 'id');
    }
}
