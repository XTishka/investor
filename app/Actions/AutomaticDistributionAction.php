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
        $wishes = Wish::query()
        ->select(['wishes.id as id', 'wishes.status as status'])
        ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
        ->where('weeks.round_id', $round->id)
        ->get();

        foreach ($wishes as $wish) {
            $wish->status = 'Not confirmed';
            $wish->save();
        }

        return $wishes;
    }
}
