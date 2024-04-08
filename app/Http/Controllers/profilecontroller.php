<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profilemodel; // นำเข้าโมเดล profilemodel

class profilecontroller extends Controller
{
    public function selected()
    {
        // ดึงข้อมูลจากฐานข้อมูลโดยใช้โมเดล profilemodel
        $hrs = profilemodel::all();
        
        // ส่งข้อมูลไปยังวิว (view) พร้อมกับชื่อตัวแปร 'hrs'
        return view('profile',compact('hrs'));
            
    }
}
?>
