<?php

namespace App\Http\Controllers;


use App\Models\formPositionsModel;
use Illuminate\Http\Request;

class C_Information extends Controller
{
    public function information()
    {
        $pos_forms = formPositionsModel::all();
        return view('information', compact('pos_forms'));

        // $user = F_Information::all();
        // return view('information', compact('user'));
    }
}
