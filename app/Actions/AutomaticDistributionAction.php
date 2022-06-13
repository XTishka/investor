<?php

namespace App\Actions;

use App\Models\Priority;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Request;

class AutomaticDistributionAction
{
    use AsAction;

    public function handle(Round $round)
    {
        $wishesReset = Wish::query()
            ->select([
                'wishes.id as id',
            ])
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->where('weeks.round_id', $round->id)
            ->get();

        foreach ($wishesReset as $wish) {
            $wish->status = 'Failed';
            $wish->save();
        }

        $highestPrioritiesWishes = Wish::query()
            ->select([
                'wishes.id as id',
                'wishes.status as status',
                'wishes.property_id as property_id',
                'weeks.round_id as round_id',
                'weeks.id as week_id',
                'weeks.number as week_number',
                'users.id as stockholder_id',
                'users.name as stockholder',
                'priorities.priority as priority',
            ])
            ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
            ->join('priorities', function ($join) {
                $join->on('wishes.user_id', '=', 'priorities.user_id');
                $join->on('weeks.round_id', '=', 'priorities.round_id');
            })
            ->join('users', 'wishes.user_id', '=', 'users.id')
            ->where('weeks.round_id', $round->id)
            ->orderBy('weeks.id')
            ->orderBy('wishes.property_id')
            ->orderBy('priorities.priority')
            ->get();

        $week = null;
        $property = null;
        $stockholder = null;
        foreach ($highestPrioritiesWishes as $wish) {
            if ($wish->week_id != $week) {
                $wish->status = 'Confirmed';
                $wish->save();
            } else {
                if ($stockholder == $wish->stockholder_id) {
                    $wish->status = 'Confirmed';
                    $wish->save();
                } else {
                    if ($property != $wish->property_id) {
                        $wish->status = 'Confirmed';
                        $wish->save();
                    }
                }
            }
            $week = $wish->week_id;
            $property = $wish->property_id;
            $stockholder = $wish->stockholder_id;
        }

        return $highestPrioritiesWishes;
    }
}
