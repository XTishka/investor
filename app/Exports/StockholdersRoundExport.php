<?php

namespace App\Exports;

use App\Models\Priority;
use App\Models\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockholdersRoundExport implements FromCollection, WithHeadings
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
        return DB::table('priorities')
            ->join('users', 'priorities.user_id', '=', 'users.id')
            ->join('rounds', 'priorities.round_id', '=', 'rounds.id')
            ->select(
                'priorities.priority as priority',
                'users.name as name',
                'users.email as email',
                'priorities.available_properties as available_properties',
            )
            ->where('rounds.id', $this->roundId)
            ->orderBy('priorities.priority')
            ->get();
    }

    public function headings(): array
    {
        return ['priority', 'name', 'email', 'available_properties'];
    }
}
