<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schema;

class SchemaController extends Controller
{
    public function create(Request $request)
    {
        return view('frontend.schema.form', ['task_id' => $request->task_id, 'action_id' => $request->action_id]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'description' => 'required',
        // ]);

        $schema = new Schema;
        $schema->task_id = $request->task_id;
        $schema->action_id = $request->action_id;
        $schema->path = $request->path;
        $schema->code = $request->code;
        $schema->description = $request->description;
        $schema->save();

        return redirect()->route('action_show', ['id' => $request->action_id]);
    }

    public function edit(Request $request)
    {
        if ($request->id) {
          $schema = Schema::find($request->id);
        }
        return view('frontend.schema.edit',['schema' => $schema]);
    }

    public function update(Request $request, $id)
    {
        $schema = Schema::find($id);
        $schema->path = $request->path;
        $schema->code = $request->code;
        $schema->description = $request->description;
        $schema->save();
        return redirect()->route('action_show', ['id' => $schema->action_id]);
    }

    public function destroy(Request $request, $id)
    {
        $schema = Schema::find($request->id);
        if ($schema) $schema->delete();
        return redirect()->route('action_show', ['id' => $request->action_id]);
    }
}
