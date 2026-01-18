<?php

namespace App\Imports;

use App\Models\BudgetData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BudgetDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BudgetData([
            'fiscal_year'   => $row['fiscal_year'],
            'ministry'      => $row['ministry'],
            'economic_code' => $row['economic_code'],
            'description'   => $row['description'],
            'amount'        => $row['amount'],
        ]);
    }
}
