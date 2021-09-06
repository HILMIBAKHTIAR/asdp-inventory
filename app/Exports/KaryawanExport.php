<?php

namespace App\Exports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaryawanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Karyawan::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Karyawan',
            'Nomor Induk Kepegawaian',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Usia',
            'Status Keluarga',
            'Tanggal Masuk Kerja',
            'Masa Kerja',
            'No. Sk',
            'Jabatan',
            'Tanggal dipilih Jabatan',
            'Masa Jabatan',
            'Pendidikan',
            'Jurusan',
            'Nomor Induk Kependudukan',
            'No. BPJS Ketenagakerjaan',
            'No. BPJS Kesehatan',
            'No. NPWP',
            'created_at',
            'updated_at',
        ];
    }
}
