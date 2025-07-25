<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PortfolioCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $creator;

    public function __construct($creator)
    {
        $this->creator = $creator;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portfolio-card');
    }
}
