<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthForm extends Component
{
    
    public $title;
    public $actionurl;


    public function __construct($title, $actionurl)
    {
        $this->title = $title;
        $this->actionurl = $actionurl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-form');
    }
}
