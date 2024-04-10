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

        } elseif ($action === 'save_database') { //database
            
            
        } else {
            
            return response()->json(['error' => 'ไม่พบการร้องขอที่ถูกต้อง'], 400);
        }
    }
    
}
