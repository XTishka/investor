<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Round;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockholderRoundExport implements FromCollection
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
        $stockholders = $round->users()->select('priority', 'id', 'name', 'email', 'wishes')->where('is_admin', '!=', 1)->orderBy('priority')->get();
        debugbar()->info($stockholders);
        return $stockholders;
    }
}
