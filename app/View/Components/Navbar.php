<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $nav_tabs;

    public function __construct()
    {
        $this->nav_tabs = [
            (object) ['name' => 'Dashboard', 'url' => route('explore.index')],
            // (object) ['name' => 'Discover', 'url' => route('search.index')],
            (object) ['name' => 'My Recipes', 'url' => route('recipes.index')],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
