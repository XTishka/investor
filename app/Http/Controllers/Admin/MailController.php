<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewUserMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function newUser($request) {
        // $objDemo = new \stdClass();
        // $objDemo->user_name = $request->name;
        // $objDemo->user_email = $request->email;
        // $objDemo->user_password = $request->password;
        // $objDemo->sender = config('app.name', 'Investering');

        // Mail::to($request->email)->send(new NewUserMail($objDemo));
    }
}
