<?php

use App\admin;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'dari'=>'manajer',
            'mata_anggaran'=>'opo ae wes',
            'nama_pengadaan'=>'beli barang',
            'tanggal_dibutuhkan'=>Carbon::now(),
        ]);
    }
}
