<?php

namespace App\View\Components\Admin\Forms\Elements;

use App\Models\User;
use Illuminate\View\Component;

class SelectWishStockholder extends Component
{
    public $round;
    public $stockholders;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->stockholders = User::query()->where('is_admin', 0)->orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.forms.elements.select-wish-stockholder');
    }
}
