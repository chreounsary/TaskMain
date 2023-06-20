<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{

    public function index()
    {
        $mails = Mail::get();
        return view('frontend.mail.list', ['mails' => $mails]);
    }

    public function create(Request $request)
    {
        return view('frontend.mail.form');
    }

    public function store(Request $request)
    {
        $mail = new Mail;
        $mail->name = $request->name;
        $mail->code = $request->code;
        $mail->description = $request->description;
        $mail->save();
        return redirect()->route('mail_index');
    }


    public function show(Request $request)
    {
        if ($request->id) {
          $mail = Mail::find($request->id);
        }
        return view('frontend.mail.show',['mail' => $mail]);
    }

    public function edit(Request $request)
    {
        if ($request->id) {
          $mail = Mail::find($request->id);
        }
        return view('frontend.mail.edit',['mail' => $mail]);
    }

    public function update(Request $request, $id)
    {
        $data = Mail::find($id);
        $data->name = $request->input('name');
        $data->code = $request->input('code');
        $data->description = $request->input('description');
        $data->save();
        return redirect()->route('mail_index');
    }

}
