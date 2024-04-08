<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profilemodel;

class p_Controller extends Controller
{
    public function index()
    {
        $hrs = profilemodel::all();
        
        // ส่งข้อมูลไปยังวิว (view) พร้อมกับชื่อตัวแปร 'hrs'
        return view('profile',compact('hrs'));
    }
}
