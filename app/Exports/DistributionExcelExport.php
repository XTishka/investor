<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DistributionExcelExport implements FromView
{
    public $weeks;
    public $stockholders;
    public $wishes;

    public function __construct($weeks, $stockholders, $wishes)
    {
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
        return view('exports.distribution-excel-export', [
            'stockholders' => $this->stockholders,
            'weeks'        => $this->weeks,
            'wishes'       => $this->wishes,
        ]);
    }
}
