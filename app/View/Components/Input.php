<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $id;
    public $placeholder;
    public $class;
    public $name;
    public $title;
    public $isRequired;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $type,
        $placeholder,
        $class,
        $name,
        $title,
        $isRequired
    ) {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->class = $class;
        $this->name = $name;
        $this->title = $title;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.input');
    }
}
