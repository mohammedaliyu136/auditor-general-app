<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class MtbRevenueProjectionTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Fiscal Year',
            'Revenue Code',
            'Description',
            'Projected Amount',
        ];
    }
}
