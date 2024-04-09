<?php

namespace App\Http\Controllers;

use App\Models\F_Information;
use App\Models\form_positions;
use App\Models\P_Password;
use Illuminate\Http\Request;

class C_Information extends Controller
{
    public function information()
    {
        $pos_forms = form_positions::all();
        return view('information', compact('pos_forms'));
    }
    public function password()
    {
        $hrs = F_Information::all();
        return view('change-password', compact('hrs'));
    }
}
