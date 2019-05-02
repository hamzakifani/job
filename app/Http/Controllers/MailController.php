<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Mail\SendEmail;
class MailController extends Controller
{
    public function home () {
        return view('mail.home');

    }

    public function sendemail (Request $request) {
        
        $this->validate($request, [
            "email"   =>"required",
            "subject" =>"required",
            "message" =>"required",

        ]);

        $email   = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to($email)->send(new SendEmail($subject, $message));
         
            Session::flash("success");
            return back();

    }










}
