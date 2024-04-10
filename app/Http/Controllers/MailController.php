<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail ;
use App\Mail\Verification ;

class MailController extends Controller
{
    public function sendMail(){
        $name = 'name' ;
        Mail::to('65160341@go.buu.ac.th')->send(new Verification ($name));
        //return view('form.form1') ;
        return view('main');
    }

    public function submitApplication(Request $request)
    {
        $name = $request -> input("name") ;
        $Surname = $request -> input("surname") ;
        $name = $name . " " . $Surname ;
        $email = $request -> input("email") ;

        //$email = new Verification($user); // $user คือ instance ของ User ที่ต้องการส่งอีเมลไปหา

        // ส่งอีเมล
        //Mail::to($request->email)->send($email) ;
        Mail::to($email)->send(new Verification($name));
        return view('form.form1');
    }
}
