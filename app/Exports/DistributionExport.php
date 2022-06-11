<?php

namespace App\Exports;

use App\Models\Priority;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;


class DistributionExport implements FromArray
{
    public function array(): array
    {
        return $this->tableDataArray();
    }

    public function tableDataArray(): array
    {
        $stockholders = DB::table('wishes')
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('properties', 'wishes.property_id', '=', 'properties.id')
            ->select(
                'wishes.id as wish_id',
                'weeks.number as week_number',
                'weeks.start_date as week_start_date',
                'weeks.end_date as week_end_date',
                'properties.name as property_name',
                'properties.country as property_country',
                'properties.address as property_address',
            )
            ->where('wishes.user_id', auth()->user()->id)
            ->where('weeks.round_id', $round_id)
            ->where('properties.id', $property_id)
            ->get();
            
        return $stockholders;
    }
}
