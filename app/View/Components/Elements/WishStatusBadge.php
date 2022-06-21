<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class WishStatusBadge extends Component
{
    public $status;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
        switch ($status) {
            case 'Confirmed':
                $this->type = 'success';
                break;

            case 'Not confirmed':
                $this->type = 'primary';
                break;

            case 'Failed':
                $this->type = 'warning';
                break;

            default:
                $this->status = 'Error';
                $this->type = 'danger';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.wish-status-badge');
    }
}
