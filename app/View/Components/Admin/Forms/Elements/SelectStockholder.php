<?php

namespace App\View\Components\Admin\Forms\Elements;

use App\Models\Round;
use Illuminate\View\Component;

class SelectStockholder extends Component
{
    public $stockholders = [];
    public $round;

    public function __construct($round)
    {
        $round = Round::find($round);
        $this->stockholders = $round->users()->get();
    }

    public function render()
    {
        return view('components.admin.forms.elements.select-stockholder');
    }
}
