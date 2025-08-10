<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public $name;
    public $title;
    public $dt;
    public $plc;
    public $type;
    
    public function __construct($name,$title,$dt,$plc,$type = 'text')
    {
        $this->name = $name;
        $this->title = $title;
        $this->dt = $dt;
        $this->type = $type;
        $this->plc = $plc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
