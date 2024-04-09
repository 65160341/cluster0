<?php

namespace App\Http\Controllers;

use App\Models\F_Student;
use App\Models\M_Student;
use App\Models\positions;

class C_student extends Controller
{
    public function selected()
    {
        $user = M_Student::all();
        return view('selected', compact('user'));
    }

    public function information()
    {
        $forms = F_Student::all();
        return view('information', compact('forms'));
    }
    public function update_selected($id)
    {
        $user = M_Student::find($id);
        if ($user->app_selected == 0) {
            $user->app_selected = "1";
        }
        $user->save();
    }
    public function show_selected()
    {
        // $user = M_Student::all();
        // if ($user->app_selected == 1) {

        // }

        // return view('selected_information', compact('user'));
        $user = M_Student::where('app_selected', 1)->get();

        return view('selected_information', compact('user'));
    }
    public function update_status($id)
    {
        $user = M_Student::find($id);
        if ($user->app_status == 1) {
            $user->app_status = "0";
        } else if ($user->app_status == 0) {
            $user->app_status = "1";
        }
        $user->save();
    }
    public function showHiddenData()
    {
        $user = M_Student::all();
        return view('hidden_data', compact('user'));
    }
    public function showPublicData()
    {
        $user = M_Student::all();
        return view('public_data', compact('user'));
    }
}
