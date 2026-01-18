<?php

namespace App\Imports;

use App\Models\MtbMacroAssumption;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MtbMacroAssumptionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MtbMacroAssumption([
            'fiscal_year' => $row['fiscal_year'],
            'variable'    => $row['variable'],
            'description' => $row['description'],
            'value'       => $row['value'],
        ]);
    }
}
