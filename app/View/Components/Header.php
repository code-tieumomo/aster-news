<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $isAdmin = auth()->check() && auth()->user()->isAdmin();
        $search = request()->q;

        return view('components.header', [
            'isAdmin' => $isAdmin,
            'search' => $search,
        ]);
    }
}
