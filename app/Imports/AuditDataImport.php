<?php

namespace App\Imports;

use App\Models\AuditData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AuditDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AuditData([
            'fiscal_year'           => $row['fiscal_year'],
            'state'                 => $row['state'],
            'statement_type'        => $row['statement_type'],
            'line_item_code'        => $row['line_item_code'],
            'line_item_description' => $row['line_item_description'],
            'fund'                  => $row['fund'],
            'amount'                => $row['amount'],
        ]);
    }
}
