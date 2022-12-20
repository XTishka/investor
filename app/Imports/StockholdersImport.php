<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Round;
use App\Actions\Stockholders\StoreAction;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class StockholdersImport implements ToCollection, WithHeadingRow
{
    public $roundId;
    public $options;

    public function __construct($roundId, $options)
    {
        $this->roundId = $roundId;
        $this->options = $options;
    }

    public function collection(Collection $collection)
    {
        $round = Round::find($this->roundId);

        if ($this->options['clean_round'] === true) {
            $round->users()->detach();
            $priority = 1;
        } else {
            $priority = $round->users()->count() + 1;
        }

        foreach ($collection->sortBy('priority') as $key => $row) {
            if ($row['name'] and $row['email']) {
                $stockholder = User::query()->withTrashed()->where('email', $row['email'])->first();

                if ($this->options['update_name'] === true) $stockholder->update(['name' => $row['name']]);

                if (!$stockholder) {
                    $createStockholder = new StoreAction;
                    $stockholder = $createStockholder->handle($row['name'], $row['email'], Str::random(8));
                } else {
                    if ($stockholder->trashed()) $stockholder->restore();
                }

                $round->users()->detach($stockholder->id);
                $round->users()->attach($stockholder->id, [
                    'wishes' => $row['wishes'] ? $row['wishes'] : 1,
                    'priority' => $priority++,
                ]);
            }
        }
    }
}
