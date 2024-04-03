<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clicknext_page extends Controller
{
    public function index() {
        return view('pages.v_index');
    }
}
