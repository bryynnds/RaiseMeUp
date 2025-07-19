<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Donate extends Component
{
    public $creator;

    public function __construct($creator)
    {
        $this->creator = $creator;
    }

    public function render()
    {
        return view('components.donate');
    }
}