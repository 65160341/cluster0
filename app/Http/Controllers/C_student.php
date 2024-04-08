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
        return view('selected', compact('user')); //
    }

    public function information()
    {
        $forms = F_Student::all();
        return view('information', compact('forms')); //
    }
     public function selected_information($id)
    {
        $user = M_Student::with('position')->find($id);
        if (!$user) {
            echo "not found";
            return response()->json(['message' => 'User not found'], 404);
        }
        $pos_id = $user->pos_id;
        $pos_name = $user->position->pos_name;

        return view('selected_information', compact('user', 'pos_id', 'pos_name'));
    }
    // public function show_selected($id) {
    //     $user = M_Student::find($id);
    //     return view('selected_information', compact('user'));
    // }
}
