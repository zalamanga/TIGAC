<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileStatistics extends Component
{
    public $title;
    public $statistics;
    public $colorTheme;
    public $icon;

    /**
     * Create a new component instance.
     * @param string $title
     * @param int statistics
     */
    public function __construct($title, $statistics, $colorTheme, $icon)
    {
        $this->title = $title;
        $this->statistics = $statistics;
        $this->colorTheme = $colorTheme;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.profile-statistics');
    }
}
