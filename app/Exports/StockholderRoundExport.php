<?php

namespace App\Exports;

use App\Models\Round;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockholderRoundExport implements FromCollection, WithHeadings
{
    public $roundId;

    public function __construct($roundId)
    {
        $this->roundId = $roundId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $round = Round::query()->find($this->roundId);
        $stockholders = $round->users()
            ->select('priority', 'id', 'name', 'email', 'wishes')
            ->where('is_admin', '!=', 1)
            ->orderBy('priority')
            ->get();
        return $stockholders;
    }

    public function headings(): array
    {
        return ['priority', 'id', 'name', 'email', 'wishes'];
    }
}
