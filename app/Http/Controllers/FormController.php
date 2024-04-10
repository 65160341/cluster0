<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formtest;
use Carbon\Carbon;

class FormController extends Controller{
// ดึงข้อมูลทั้งหมดจากตาราง position_form
public function index(){
   return view('maintest');

}

public function store(Request $request){
    // dd($request);
    // $data = $request->validate([
    //     'form_date_start' => 'request|date',
    //     'form_date_end' => 'request|date',
    //     'form_detail' => 'request',
    //     'token' => 'request',
    //     'form_position_type' => 'request|date',
    //     'pos_id' => 'request|date',
    //     'form_amount_of_postion' => 'request|date'

    // ]);

    // foreach($request->data as $key => $value){
    //     Formtest::create($value);
    // }
    // วนลูปเพื่อสร้างข้อมูลสำหรับแต่ละแถว
   
        // สร้างข้อมูลใหม่ของ PositionForm
        // สร้างข้อมูลใหม่จากข้อมูลที่ส่งมาจากฟอร์ม
        $formData = new Formtest();
        $formData->form_date_start = $request->input('form_date_start');
        $formData->form_date_end = $request->input('form_date_end');
        $formData->form_detail = $request->input('pf_info');

        // บันทึกข้อมูลฟอร์ม
        // $formData->save();
        $token = $request->input('_token');
        // สร้างข้อมูลสำหรับแต่ละแถวที่ส่งมาจากฟอร์มและบันทึกลงในฐานข้อมูล
        $positions = $request->input('pos_id[data]');
        $jobTypes = $request->input('pf_type_jobs[data]');
        $amounts = $request->input('pf_amount_of_position[data]');
        // $positionForm = new PositionForm();
        $formData->pos_id = $positions;
        $formData->form_position_type = $jobTypes;
        $formData->form_amount_of_postion = $amounts;
        // $formData->form_id = $formData->id; // ตั้งค่าคีย์นอกสำหรับการเชื่อมโยงกับฟอร์มที่บันทึกไว้ก่อนหน้านี้

        // บันทึกข้อมูล PositionForm
        $formData->save();
    

    return redirect()->route('test.index'); // เมื่อบันทึกเสร็จสิ้น กลับไปยังหน้าที่ต้องการ
}

}
