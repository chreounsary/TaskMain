<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Module;

class ModuleController extends Controller
{
    public function create(Request $request)
    {
        $tasks = Task::get();
        $tasks->task_id = $request->task_id;
        $tasks->project_id = $request->project_id;
        return view('frontend.modules.form', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $module = new Module;
        $module->name = $request->name;
        $module->description = $request->description;
        $module->project_id = $request->project_id;
        $module->task_id = $request->task_id;
        $module->save();

        return redirect()->route('project_index');
    }
}
