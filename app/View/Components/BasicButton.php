<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BasicButton extends Component
{
    public $w;
    public $h;
    /**
     * Create a new component instance.
     */
    public function __construct(string $w = 'w-full', string $h = '')
    {
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.basic-button');
    }
}
