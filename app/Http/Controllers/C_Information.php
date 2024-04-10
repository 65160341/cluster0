<?php

namespace App\Http\Controllers;


use App\Models\form_positions;
use Illuminate\Http\Request;

class C_Information extends Controller
{
    public function information()
    {
        $pos_forms = form_positions::all();
        return view('information', compact('pos_forms'));
    }
}
