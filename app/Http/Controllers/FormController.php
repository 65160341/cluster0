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
    $countForm = Formtest::all();
    $count = 1;
    foreach($countForm as $item){
        $count++;
    }
    $formData = new Formtest();
    $formData->form_round_count = $count;
    $formData->form_round_year = Carbon::now()->year;
    $formData->form_date_start = $request->input('form_date_start');
    $formData->form_date_end = $request->input('form_date_end');
    $formData->form_detail = $request->input('pf_info');

    $token = $request->input('_token');
    // สร้างข้อมูลสำหรับแต่ละแถวที่ส่งมาจากฟอร์มและบันทึกลงในฐานข้อมูล
    $positions = $request->input('pos_id[]');
    $jobTypes = $request->input('pf_type_jobs[]');
    $amounts = $request->input('pf_amount_of_position[]');
    // $positionForm = new PositionForm();
    $formData->pos_id = $positions;
    $formData->form_position_type = $jobTypes;
    $formData->form_amount_of_postion = $amounts;

    // บันทึกข้อมูล PositionForm
    $formData->save();


return redirect()->route('test.index'); // เมื่อบันทึกเสร็จสิ้น กลับไปยังหน้าที่ต้องการ
}
}
