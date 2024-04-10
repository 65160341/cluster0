<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clicknext_page extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }
}
