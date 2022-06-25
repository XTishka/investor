<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use App\Models\Round;
use Illuminate\Support\Arr;
use App\Http\Traits\ActiveRoundTrait;

class DistributionExport implements FromArray
{
    use ActiveRoundTrait;

    protected $roundId;

    function __construct($round_id)
    {
        $this->roundId = ($round_id) ? $round_id : $this->activeRound()->id;
    }

    public function array(): array
    {

        $export = array_merge([$this->tableHeadersArray()], $this->tableDataArray());
        return $export;
    }

    public function tableHeadersArray()
    {
        $roundModel = new Round();
        $round = $roundModel->find($this->roundId);
        $headers = ['id', 'stockholder', 'priority'];
        for ($i = 1; $i <= $round->max_wishes; $i++) {
            $wishes = ['property_' . $i, 'week_' . $i, 'status_' . $i];
            $headers = array_merge($headers, $wishes);
        }
        return $headers;
    }

    public function tableDataArray(): array
    {
        $stockholders = DB::table('priorities')
            ->join('users', 'priorities.user_id', '=', 'users.id')
            ->select(
                'users.id as id',
                'users.name as user_name',
                'priorities.priority as priority',
            )
            ->where('users.is_admin', '=', 0)
            ->where('priorities.round_id', '=', $this->roundId)
            ->orderBy('priorities.priority')
            ->get();

        foreach ($stockholders as $stockholder) {
            $counter = 1;
            foreach ($this->getWishes($stockholder->id, $this->roundId) as $wish) {
                $property = 'property_' . $counter;
                $week = 'week_' . $counter;
                $status = 'status_' . $counter;
                $stockholder->$property = $wish->property_name;
                $stockholder->$week = $wish->week_number;
                $stockholder->$status = $wish->wish_status;
                $counter++;
            }
        }
        return $stockholders->toArray();
    }

    public function getWishes($user_id, $round_id)
    {
        return DB::table('wishes')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as wish_id',
                'weeks.number as week_number',
                'properties.name as property_name',
                'wishes.status as wish_status'
            )
            ->where('wishes.user_id', $user_id)
            ->where('weeks.round_id', $round_id)
            ->get();
    }
}
