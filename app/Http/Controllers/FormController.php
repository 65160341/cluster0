<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formtest;
use App\Models\PosittionTest;
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
    $positionData = new PosittionTest();
    $formData = new Formtest();
    $formData->form_round_count = $count;
    $formData->form_round_year = Carbon::now()->year;
    $formData->form_date_start = $request->input('form_date_start');
    $formData->form_date_end = $request->input('form_date_end');
    $formData->form_detail = $request->input('pf_info');

    $token = $request->input('_token');
    // สร้างข้อมูลสำหรับแต่ละแถวที่ส่งมาจากฟอร์มและบันทึกลงในฐานข้อมูล
    $positions = $request->input('pos_id')['0'];
    $jobTypes = $request->input('pf_type_jobs')['0'];
    $amounts = $request->input('pf_amount_of_position')['0'];
    // $positionForm = new PositionForm();
    $formData->pos_id = $positions;
    $formData->form_position_type = $jobTypes;
    $formData->form_amount_of_postion = $amounts;

    $positionData->pos_id = $positions;
    $positionData->job_type = $jobTypes;
    $positionData->amount_of_postion = $amounts;
    // บันทึกข้อมูล PositionForm
    $positionData->save();
    $formData->save();


return redirect()->route('test.index'); // เมื่อบันทึกเสร็จสิ้น กลับไปยังหน้าที่ต้องการ
}
}
