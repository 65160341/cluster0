<?php

namespace App\Http\Controllers;

use App\Models\M_Student;

class C_student extends Controller
{
    public function selected()
    {
        $students = M_Student::all();
        return view('selected', compact('students')); //
    }

    public function information()
    {
        $students = M_Student::all();
        return view('information', compact('students')); //
    }
}
