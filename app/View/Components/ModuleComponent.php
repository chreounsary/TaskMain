<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Module;

class ModuleComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $modules = Module::limit(10)->get();
        return view('components.module-component', ['modules' => $modules]);
    }
}
