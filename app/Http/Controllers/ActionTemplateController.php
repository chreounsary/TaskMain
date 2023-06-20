<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActionTemplate;
use App\Models\Action;

class ActionTemplateController extends Controller
{
    public function create(Request $request)
    {
        return view('frontend.action_template.form', ['action_id' => $request->id]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'description' => 'required',
        //     'code' => 'required',
        //     'path' => 'required',
        // ]);
        if ($request->id) {
            $action = Action::find($request->id);
            $action_temp = new ActionTemplate;
            $action_temp->project_id = $action->task->project_id;
            $action_temp->task_id = $action->task_id;
            $action_temp->action_id = $action->id;
            $action_temp->name = $request->name;
            $action_temp->description = $request->description;
            $action_temp->code = $request->code;
            $action_temp->path = $request->path;
            $action_temp->save();
        }

        return redirect()->route('task_index');
    }

    public function edit(Request $request)
    {
        if ($request->id) {
          $action_temp = ActionTemplate::find($request->id);
        }
        return view('frontend.action_template.edit',['action_temp' => $action_temp]);
    }

    public function update(Request $request, $id)
    {
        $data = ActionTemplate::find($request->id);
        $data->name = $request->input('name');
        $data->path = $request->input('path');
        $data->code = $request->input('code');
        $data->description = $request->input('description');
        $data->save();
        return redirect()->route('action_show', ['id' => $data->action_id, 'collapse' => 1]);
    }
}
