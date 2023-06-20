<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yaml;

class YamlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yamls = Yaml::get();
        return view('frontend.yaml.list', ['yamls' => $yamls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.yaml.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $yaml = new Yaml;
        $yaml->name = $request->name;
        $yaml->path = $request->path;
        $yaml->code = $request->code;
        $yaml->description = $request->description;
        $yaml->save();

        return view('frontend.yaml.list', ['tasks' => $tasks]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id) {
          $yaml = Yaml::find($id);
        }
        return view('frontend.yaml.show',['yaml' => $yaml]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($yaml)
    {
        
        if ($yaml) {
          $yaml = Yaml::find($yaml);
        }

        return view('frontend.yaml.edit',['yaml' => $yaml]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Yaml::find($id);
        $data->name = $request->input('name');
        $data->code = $request->input('code');
        $data->description = $request->input('description');
        $data->save();
        return redirect()->route('yamls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
