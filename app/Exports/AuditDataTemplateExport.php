<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class AuditDataTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Fiscal Year',
            'State',
            'Statement Type',
            'Line Item Code',
            'Line Item Description',
            'Fund',
            'Amount',
        ];
    }
}
