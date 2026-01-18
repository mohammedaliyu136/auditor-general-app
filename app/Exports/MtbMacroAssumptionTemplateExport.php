<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class MtbMacroAssumptionTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Fiscal Year',
            'Variable',
            'Description',
            'Value',
        ];
    }
}
