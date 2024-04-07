<?php

namespace App\Http\Controllers;

use App\Models\F_Student;
use App\Models\M_Student;

class C_student extends Controller
{
    public function selected()
    {
        $user = M_Student::all();
        return view('selected', compact('user')); //
    }

    public function information()
    {
        $forms = F_Student::all();
        return view('information', compact('forms')); //
    }
}
