<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactFormController extends Controller
{

    public function store(Request $request)
    {
        $action = $request->input('action');

        if ($action === 'save_session') {

            return redirect('/contact');

        } elseif ($action === 'save_database') {
            
            $data = $request->all();
            

            return response()->json(['message' => 'บันทึกข้อมูลลงในฐานข้อมูลเรียบร้อยแล้ว'], 200);
        } else {
            
            return response()->json(['error' => 'ไม่พบการร้องขอที่ถูกต้อง'], 400);
        }
    }
    
}
