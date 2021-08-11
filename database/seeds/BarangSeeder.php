<?php

use App\barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        barang::create([
            'admin_id'=>1,
            'jumlah'=>12,
            'satuan'=>'pcs',
            'nama_barang'=>'kentang',
            'spesifikasi'=>'yhaaa',
            'harga_satuan'=>150000
        ]);
    }
}
