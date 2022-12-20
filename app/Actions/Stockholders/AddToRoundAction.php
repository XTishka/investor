<?php

namespace App\Actions\Stockholders;

use App\Models\Round;
use Exception;

class AddToRoundAction
{
    public function handle($stockholderId, $roundId, $wishes, $priority = 'default')
    {
        $round = Round::find($roundId);
        if ($priority == 'default') {
            $stockholdersQty = $round->users()->where('round_id', $roundId)->count();
            $priority = $stockholdersQty + 1;
        }
        $round->users()->detach($stockholderId);
        if ($wishes) {
            try {
                $round->users()->attach($stockholderId, [
                    'wishes' => $wishes,
                    'priority' => $priority,
                ]);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }
}
