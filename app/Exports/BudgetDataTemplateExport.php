<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class BudgetDataTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Fiscal Year',
            'Ministry',
            'Economic Code',
            'Description',
            'Amount',
        ];
    }
}
