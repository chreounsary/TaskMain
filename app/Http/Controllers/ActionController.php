<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Action;

class ActionController extends Controller
{
  public function create(Request $request)
  {
    return view('frontend.action.form');
  }

	public function store(Request $request)
	{
		$action = new Action;
		$action->task_id = $request->task_id;
		$action->requirement = $request->requirement;
		$action->name = $request->name;
		$action->path = $request->path;
		$action->body = $request->code;
		$action->description = $request->description;
		$action->save();
		return redirect()->route('task_show', ['id' => $request->task_id]);
	}

	public function show(Request $request)
	{
		if ($request->id) {
		  $action = Action::find($request->id);
		}
		return view('frontend.action.show',['actions' => $action]);
	}

  public function edit(Request $request)
  {
    if ($request->id) {
      $action = Action::where('id', $request->id)
      					->where('task_id', $request->t_id)
      					->first();
    }

    $task = Task::find($request->t_id);
    return view('frontend.task.show',['action' => $action, 'task' => $task]);
  }


  public function update(Request $request, $id)
  {
    $data = Action::find($id);
    $data->task_id = $request->input('task_id');
    $data->requirement = $request->input('requirement');
    $data->name = $request->input('name');
    $data->path = $request->input('path');
    $data->body = $request->input('code');
    $data->description = $request->input('description');
    $data->save();
    return redirect()->route('task_show', ['id' => $data->task_id]);
  }

}
