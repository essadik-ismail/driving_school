<?php

namespace App\View\Components;

use Illuminate\View\Component;

class importExport extends Component
{

    public $foreignKeys;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $foreignKeys,
        $route,
    ) {
        $this->foreignKeys = $foreignKeys;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.import-export');
    }
}
