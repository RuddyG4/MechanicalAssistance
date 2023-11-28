<?php

namespace App\View\Components;

use App\Models\Workshop;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WorkshopLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Workshop $workshop
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.workshop-layout');
    }
}
