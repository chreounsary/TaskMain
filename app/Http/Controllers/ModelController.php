<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Models;

class ModelController extends Controller
{
    public function index($value='')
    {
        dd('ddd');
    }
    
    public function create(Request $request)
    {
        $action = Action::find($request->action_id);
        return view('frontend.model.form', ['action' => $action,'project_id' => $request->project_id, 'task_id' => $request->task_id, 'action_id' => $request->action_id]);
    }

    public function store(Request $request)
    {
        $model = new Models;
        $model->project_id = $request->project_id;
        $model->task_id = $request->task_id;
        $model->action_id = $request->action_id;
        $model->name = $request->name;
        $model->path = $request->path;
        $model->code = $request->code;
        $model->description = $request->description;
        $model->save();
        return redirect()->route('action_show', ['id' => $request->action_id]);
    }
}
