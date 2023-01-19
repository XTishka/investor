<?php

namespace App\View\Components\Admin\Forms\Elements;

use Illuminate\View\Component;

class SelectWishStatus extends Component
{
    public $statuses = [
        'confirmed'           => 'Confirmed',
        'failed'              => 'Failed',
        'overlimit_confirmed' => 'Overlimit confirmed',
        'overlimit_failed'    => 'Overlimit failed',
    ];

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.elements.select-wish-status');
    }
}
