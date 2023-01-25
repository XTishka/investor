<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DistributionExcelExport implements FromView
{
    public $weeks;
    public $stockholders;
    public $wishes;

    public function __construct($weeks, $stockholders)
    {
        $this->weeks        = $weeks;
        $this->stockholders = $stockholders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        debugbar()->info($this->stockholders);
        return view('exports.distribution-excel-export', [
            'stockholders' => $this->stockholders,
            'weeks'        => $this->weeks,
        ]);
    }
}