<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RoundInfoExport implements FromView
{
    public $stockholders;

    public function __construct($stockholders)
    {
        $this->stockholders = $stockholders;
    }

    public function view(): View
    {
        return view('exports.round-info-export', [
            'stockholders' => $this->stockholders,
        ]);
    }
}
