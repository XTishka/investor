<?php

namespace App\Actions\Stockholders;

use App\Models\Round;

class ImportFromRound
{
    public function handle($fromRoundId, $toRoundId)
    {
        Round::query()->find($toRoundId)->users()->detach();
        $stockholders = Round::query()->find($fromRoundId)->users()->orderBy('priority')->get();

        $priority = 1;
        foreach ($stockholders as $stockholder) {
            $action = new AddToRoundAction;
            $action->handle($stockholder->id, $toRoundId, $stockholder->pivot->wishes, $priority++);
        }
    }
}
