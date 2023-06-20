<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\FriendShip;

class FriendController extends Controller
{
    public function index(Type $var = null)
    {
        $data = FriendShip::all();
        return view('frontend.friend.index', compact('data'));
    }

    public function requestCreate($id)
    {   
        $user = User::where('id', $id)->firstOrFail();
        $friend = FriendShip::where('link_to', $user->id);
        if($user && count($friend->get()) == 0){
            $friend = new FriendShip();
            $friend->link_from = Auth::user()->id;
            $friend->link_to = $user->id;
            $friend->is_request = true;
            $friend->save();
        }
        else
        {
            $friend->delete();
        }
        return view('frontend.friend.index', compact('data'));
    }
}
