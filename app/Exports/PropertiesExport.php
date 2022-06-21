<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertiesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Property::query()
            ->select('id', 'name', 'country', 'address', 'description')
            ->get();
    }

    public function headings(): array
    {
        return ['id', 'name', 'country', 'address', 'description'];
    }
}
