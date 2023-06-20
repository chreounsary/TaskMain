<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Task;
use App\Models\Project;
use DB;

class TaskController extends Controller
{
	public function index()
	{
		$tasks = Task::get();
		return view('frontend.task.list', ['tasks' => $tasks]);
	}

	public function create(Request $request)
	{
		$projects = DB::table('projects')
			->orderBy('created_at', 'desc')
			->get();
		$projects->project_id = $request->project_id;
		return view('frontend.task.form', ['projects' => $projects]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:255',
			'description' => 'required',
		]);

		$task = new Task;
		$task->project_id = $request->project;
		$task->name = $request->name;
		$task->description = $request->description;
		$task->save();

		return redirect()->route('task_index');
	}

	public function edit(Request $request)
	{
		if ($request->id) {
		  $task = Task::find($request->id);
		}

		$task->projects = Project::get();
		return view('frontend.task.edit',['task' => $task]);
	}

	public function update(Request $request, $id)
	{
		$data = Task::find($id);
		$data->project_id =  $request->project;
		$data->name = $request->input('name');
		$data->description = $request->input('description');
		$data->save();
		return redirect()->route('task_index')->with('success', 'Data updated successfully.');
	}


	public function destroy(Request $request, $id)
	{
		$task = Task::find($request->id);
		if ($task) $task->delete();
		return redirect('/');
	}

	public function show(Request $request)
	{
		if ($request->id) {
		  $task = Task::find($request->id);
		}
		return view('frontend.task.show',['task' => $task]);
	}

}
