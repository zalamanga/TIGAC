<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardPageHeading extends Component
{
    public $title;
    public $currentPage;

    /**
     * Create a new component instance.
     * @param string $title
     */
    public function __construct($title, $currentPage)
    {
        $this->title = $title;
        $this->currentPage = $currentPage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard-page-heading');
    }
}
