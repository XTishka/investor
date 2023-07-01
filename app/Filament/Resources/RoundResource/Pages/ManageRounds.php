<?php

namespace App\Filament\Resources\RoundResource\Pages;

use App\Models\Round;
use Filament\Pages\Actions;
use App\Filament\Resources\RoundResource;
use Filament\Resources\Pages\ManageRecords;

class ManageRounds extends ManageRecords
{
    protected static string $resource = RoundResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->after(function (Round $record) {
                    if ($record->active == 1)
                        Round::where('id', '<>', $record->id)
                            ->update(['active' => 0]);
                }),
        ];
    }
}
