<?php

namespace App\Http\Controllers;


use App\Models\formPositionsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class C_Information extends Controller
{
    public function information()
    {
        $today = Carbon::now();
        $pos_forms = formPositionsModel::all();
        return view('information', compact('pos_forms', 'today'));

        // $user = F_Information::all();
        // return view('information', compact('user'));
    }
}
