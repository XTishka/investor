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
        foreach ($this->stockholders as $stockholder) :
            debugbar()->info($stockholder);
        endforeach;
        return view('exports.distribution-excel-export', [
            'stockholders' => $this->stockholders,
            'weeks'        => $this->weeks,
        ]);
    }
}
