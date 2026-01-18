<?php

namespace App\Imports;

use App\Models\DsaData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DsaDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DsaData([
            'fiscal_year'   => $row['fiscal_year'],
            'state'         => $row['state'],
            'variable_type' => $row['variable_type'],
            'variable_code' => $row['variable_code'],
            'description'   => $row['description'],
            'value'         => $row['value'],
        ]);
    }
}
