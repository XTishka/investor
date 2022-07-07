<?php

namespace App\Actions;

use App\Models\Priority;
use App\Models\Round;
use App\Models\Week;
use App\Models\Wish;
use Debugbar;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Request;

class AutomaticDistributionAction
{
    use AsAction;

    public function handle(Round $round)
    {
        $this->resetWishesToFailed($round);

        $stockholders = Priority::where('round_id', $round->id)->orderBy('priority')->get();
        foreach ($stockholders as $stockholder) {
            $wishes = Wish::query()
                ->select([
                    'wishes.id as id',
                    'wishes.user_id as user_id',
                    'wishes.priority as priority',
                    'wishes.week_id as week_id',
                    'wishes.property_id as property_id',
                    'wishes.status as status',
                    'weeks.id as week_id',
                ])
                ->join('weeks', 'wishes.week_id', '=', 'weeks.id')
                ->where('user_id', $stockholder->user_id)
                ->where('weeks.round_id', $round->id)
                ->orderBy('wishes.priority')
                ->get();

            $wishesCounter = 0;
            foreach ($wishes as $wish) {
                if ($wishesCounter < $stockholder->available_wishes) {
                    $saveWish = $this->saveConfirmed($wish);
                    if ($saveWish == true) $wishesCounter++;
                }
            }
        }
    }


    /**
     * Save Wish
     *
     * @param  mixed $wish
     * @return void
     */
    private function saveConfirmed($wish)
    {
        $save = false;
        $notFree = Wish::query()
            ->where('week_id', $wish->week_id)
            ->where('property_id', $wish->property_id)
            ->where('status', 'Confirmed')
            ->exists();
        if ($notFree == false) {
            $wish->status = 'Confirmed';
            $wish->save();
            $save = true;
        }
        return $save;
    }

    /**
     * Set Failes status for all wishes
     *
     * @return void
     */
    private function resetWishesToFailed($round)
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
    }
}
