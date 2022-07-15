<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReportTypes extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function departmentType(){
        if($this->type == 'DBE'){
            return 'dbe-btn';
        }
        else if($this->type == 'DCI'){
            return 'dci-btn';
        }
        else if($this->type == 'DTE'){
            return 'dte-btn';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.report-types');
    }
}
