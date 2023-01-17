<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Arr;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DistributionCsvExport implements FromView
{
    public $round;
    public $weeks;
    public $stockholders;
    public $wishes;

    public function __construct($round, $weeks, $stockholders, $wishes)
    {
        $this->round        = $round;
        $this->weeks        = $weeks;
        $this->stockholders = $stockholders;
        $this->wishes       = $wishes;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        debugbar()->info($this->weeks);
        return view('exports.distribution-csv-export', [
            'stockholders' => $this->stockholders,
            'weeks'        => $this->weeks,
            'wishes'       => $this->wishes,
        ]);
    }
}
