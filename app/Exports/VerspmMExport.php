<?php

namespace App\Exports;

use App\VerspmM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VerspmMExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Verifikator',
            'Pembuat Verifikator',
            'Tanggal Surat',
            'Uraian Pekerjaan',
            'Devisi',
        ];
    }
    public function collection()
    {
        return VerspmM::with('verif','karyawan')->get();
    }
    public function map($data_verspmm): array
    {
        return [
            $data_verspmm->verif->nama_karyawan,
            $data_verspmm->karyawan->nama_karyawan,
            $data_verspmm->tanggal_surat,
            $data_verspmm->uraian_pekerjaan,
            $data_verspmm->devisi,
        ];
    }
}
