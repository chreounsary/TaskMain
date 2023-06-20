<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(Type $var = null)
    {   $data = User::all();
        return view('frontend.user.index', compact('data'));
    }
    public function show(Request $request)
    {
        $data = User::find($request->id);
        return view('frontend.user.show', compact('data'));
    }
}
