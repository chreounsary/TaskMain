<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormBuilder;

class FormBuilderController extends Controller
{
    
    public function create(Request $request)
    {
        return view('frontend.form_builder.form', ['task_id' => $request->task_id, 'action_id' => $request->action_id]);
    }

    public function store(Request $request)
    {
        $form_builder = new FormBuilder;
        $form_builder->task_id = $request->task_id;
        $form_builder->action_id = $request->action_id;
        $form_builder->component_id = $request->component_id;
        $form_builder->name = $request->name;
        $form_builder->path = $request->path;
        $form_builder->code = $request->code;
        $form_builder->description = $request->description;
        $form_builder->save();

        return redirect()->route('action_show', ['id' => $request->action_id]);
    }

    public function edit(Request $request)
    {
        if ($request->id) {
          $form_builder = FormBuilder::find($request->id);
        }
        return view('frontend.form_builder.edit',['form_builder' => $form_builder]);
    }

}
