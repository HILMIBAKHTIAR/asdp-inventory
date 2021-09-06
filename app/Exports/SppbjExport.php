<?php

namespace App\Exports;

use App\Sppbj;
use Maatwebsite\Excel\Concerns\FromCollection;

class SppbjExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sppbj::all();
    }
}
