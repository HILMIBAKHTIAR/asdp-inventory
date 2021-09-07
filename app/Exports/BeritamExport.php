<?php

namespace App\Exports;

use App\BeritaM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BeritamExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'No Surat',
            'Surat Ditu jukan',
            'Tanggal Surat',
            'Alamat Tujuan',
        ];
    }
    public function collection()
    {
        return BeritaM::with('karyawanBerita')->get();
    }
    public function map($data_beritamm): array
    {
        return [
            $data_beritamm->nomor_surat_berita,
            $data_beritamm->karyawanBerita->jabatan,
            $data_beritamm->tanggal_surat,
            $data_beritamm->alamat_tujuan,
        ];
    }
}
