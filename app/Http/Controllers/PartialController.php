<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partial;

class PartialController extends Controller
{
    
    public function create(Request $request)
    {
        return view('frontend.partial.form', ['temp_id' => $request->temp_id, 'action_id' => $request->a_id]);
    }

    public function store(Request $request)
    {
        $partial = new Partial;
        $partial->action_temp_id = $request->temp_id;
        $partial->name = $request->name;
        $partial->path = $request->path;
        $partial->code = $request->code;
        $partial->description = $request->description;
        $partial->save();
        return redirect()->route('action_show', ['id' => $request->action_id]);
    }

}
