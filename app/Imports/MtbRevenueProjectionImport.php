<?php

namespace App\Imports;

use App\Models\MtbRevenueProjection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MtbRevenueProjectionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MtbRevenueProjection([
            'fiscal_year'      => $row['fiscal_year'],
            'revenue_code'     => $row['revenue_code'],
            'description'      => $row['description'],
            'projected_amount' => $row['projected_amount'],
        ]);
    }
}
