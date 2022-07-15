<?php

namespace App\View\Components;

use Illuminate\View\Component;

class programcard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $program;


    public function __construct($program)
    {
        $this->program=$program;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.program-card');
    }
}
