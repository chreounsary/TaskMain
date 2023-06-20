<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Components;
use App\Models\Task;

class ComponentController extends Controller
{
  public function create(Request $request)
  {
    return view('frontend.component.form');
  }

  public function store(Request $request)
  {
    $component = new Components;
    $component->task_id = $request->task_id;
    $component->name = $request->name;
    $component->path = $request->path;
    $component->body = $request->code;
    $component->save();
    return redirect()->route('task_show', ['id' => $request->task_id]);
  }

  public function show(Request $request)
  {
    if ($request->id) {
      $component = Components::find($request->id);
    }
    return view('frontend.component.show',['component' => $component]);
  }


  public function edit(Request $request)
  {
    if ($request->id) {
      $component = Components::where('id', $request->id)
                ->where('task_id', $request->t_id)
                ->first();
    }

    $task = Task::find($request->t_id);
    return view('frontend.task.show',['component' => $component, 'task' => $task]);
  }


  public function update(Request $request, $id)
  {
      $data = Components::find($request->id);
      $data->name = $request->input('name');
      $data->path = $request->input('path');
      $data->body = $request->input('code');
      $data->description = $request->input('description');
      $data->save();
      return redirect()->route('task_show', ['id' => $data->task_id, 'collapse' => 1]);
  }
}
