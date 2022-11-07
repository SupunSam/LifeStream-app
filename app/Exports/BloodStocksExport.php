<?php

namespace App\Exports;

use App\Models\BloodStock;
use Maatwebsite\Excel\Concerns\FromCollection;

class BloodStocksExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return BloodStock::all();
    }
}
