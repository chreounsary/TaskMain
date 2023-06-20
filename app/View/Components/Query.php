<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Project;

class Query extends Component
{
    // public $user;

    // public function __construct($user)
    // {
    //     $this->user = $user;
    // }

    public function render()
    {

        $projects = Project::get();
        return view('components.query', ['projects' => $projects]);
    }
}
