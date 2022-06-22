<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class FormDateRange extends Component
{
    public $label;
    public $range_id;
    public $range_name;
    public $start_date_id;
    public $start_date_name;
    public $end_date_id;
    public $end_date_name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $range_id, $range_name, $start_date_id, $start_date_name, $end_date_id, $end_date_name)
    {
        $this->$label = $label;
        $this->$range_id = $range_id;
        $this->$range_name = $range_name;
        $this->$start_date_id = $start_date_id;
        $this->$start_date_name = $start_date_name;
        $this->$end_date_id = $end_date_id;
        $this->$end_date_name = $end_date_name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elements.form-date-range');
    }
}
