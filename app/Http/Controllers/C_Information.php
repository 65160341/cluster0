<?php

namespace App\Http\Controllers;

use App\Models\F_Information;
use Illuminate\Http\Request;

class C_Information extends Controller
{
    public function information()
    {

        $Testforms = F_Information::all();
        return view('information', compact('Testforms'));

        // $user = F_Information::all();
        // return view('information', compact('user'));
    }
}
