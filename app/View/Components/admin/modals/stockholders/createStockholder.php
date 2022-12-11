<?php

namespace App\View\Components\admin\modals\stockholders;

use Illuminate\View\Component;
use App\Models\Round;

class createStockholder extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modals.stockholders.create-stockholder');
    }
}
