<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;
use DB;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return view('frontend.project.list', ['projects' => $projects]);
    }

    public function create(Request $request)
    {
        return view('frontend.project.form');
    }

    public function edit(Request $request)
    {
        if ($request->id) {
          $project = Project::find($request->id);
        }
        return view('frontend.project.edit',['project' => $project]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return redirect()->route('project_index');
    }

    public function update(Request $request, $id)
    {
        $data = Project::find($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        // Update other fields as needed
        $data->save();
        return redirect()->route('project_index')->with('success', 'Data updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $project = Project::find($request->id); 
        $project->delete();
        return redirect()->route('project_index')->with('success', 'Data deleted successfully!');
    }


    public function show(Request $request)
    {
        if ($request->id) {
          $project = Project::find($request->id);
        }
        return view('frontend.project.show',['project' => $project]);
    }



}
