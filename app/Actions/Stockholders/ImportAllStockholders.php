<?php

namespace App\Actions\Stockholders;

use App\Models\Round;
use App\Models\User;

class ImportAllStockholders
{
    public function handle($toRoundId)
    {
        Round::query()->find($toRoundId)->users()->detach();
        $stockholders = User::all()->sortBy('name');

        $priority = 1;
        foreach ($stockholders as $stockholder) {
            $action = new AddToRoundAction;
            $action->handle($stockholder->id, $toRoundId, 1, $priority++);
        }
    }
}
