<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthForm extends Component
{
    public $title;

    public $actionurl;

    public $changeMessageHeader;

    public $changeMessageContent;

    public $changeMessageUrl;

    public function __construct($title, $actionurl, $changeMessageHeader = '', $changeMessageContent = '', $changeMessageUrl = '#')
    {
        $this->title = $title;
        $this->actionurl = $actionurl;
        $this->changeMessageHeader = $changeMessageHeader;
        $this->changeMessageContent = $changeMessageContent;
        $this->changeMessageUrl = $changeMessageUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth-form');
    }
}
