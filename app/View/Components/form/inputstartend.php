<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputstartend extends Component
{
    public $name;
    public $dt;
    public $title;
    public function __construct($name,$dt,$title)
    {
        $this->name = $name;
        $this->dt = $dt;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.inputstartend');
    }
}
