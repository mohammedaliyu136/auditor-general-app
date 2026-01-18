<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class DsaDataTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Fiscal Year',
            'State',
            'Variable Type',
            'Variable Code',
            'Description',
            'Value',
        ];
    }
}
