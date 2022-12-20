<?php

namespace App\Actions\Stockholders;

use App\Imports\StockholdersImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportFromFile
{
    public function handle($toRound, $options)
    {
        // TODO: Aditional import from file options
        Excel::import(new StockholdersImport($toRound, $options), $options['resource']->store('temp'));
    }
}
