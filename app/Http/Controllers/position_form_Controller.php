<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PositionForm;
use App\Models\Positions;
use App\Models\Formtest;
use Carbon\Carbon;
class position_form_controller extends Controller
{// ดึงข้อมูลทั้งหมดจากตาราง position_form
    public function index()
    {
    //    return view('maintest', compact(''));
       return view('maintest');
    
    }
    // // แสดงฟอร์มสำหรับเพิ่มข้อมูล
    // public function create()
    // {
    //     return view('creatform');
    // }
    // public function createform()
    // {
    // $positionForms = position_form::all(); // ดึงข้อมูลจากฐานข้อมูล
    // return view('creatform', compact('positionForms'));
    // }

public function store(Request $request){
    // Validate ข้อมูลตามต้องการ
    $PositionForm = new Formtest();
    $PositionForm->pf_type_jobs = $request->input('pf_type_jobs[]'); // แก้ชื่อตามที่ต้องการ
    $PositionForm->pf_amount_of_position = $request->input('pf_amount_of_position[]'); // แก้ชื่อตามที่ต้องการ
    $PositionForm->pos_id = $request->input('pos_id[]');

    // คำนวณเลขลำดับใหม่
    $lastRoundCount = PositionForm::orderBy('form_roundcount', 'desc')->first();
    if (!$lastRoundCount) {
        // หากไม่มีการบันทึกก่อนหน้า ให้กำหนดค่าเริ่มต้นเป็น 1/ปีปัจจุบัน
        $PositionForm->form_roundcount = '1/' . Carbon::now()->year;
    } else {
        // แยกค่า index และปีจากค่าปัจจุบัน
        $parts = explode('/', $lastRoundCount->form_roundcount);
        if (isset($parts[1])) {
            // หากมีปีในค่าปัจจุบัน
            $index = intval($parts[0]); // แปลงเป็นตัวเลขและเพิ่มค่านับ index ขึ้นไปอีก 1
            $year = $parts[1];
            $index++;
        } else {
            // หากไม่มี index 1 ใน array ที่ได้จาก explode() กำหนดค่าใหม่เป็น 1/ปีปัจจุบัน
            $index = 1;
            $year = Carbon::now()->year;
        }

        // กำหนดค่าใหม่ให้กับ form_roundcount
        $PositionForm->form_roundcount = $index . '/' . $year;
    }

    //save
    $PositionForm->save();

    // ส่งคำตอบกลับไปยังผู้ใช้หรือทำการ redirect ตามต้องการ
    return redirect('test')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
}

    public function update(Request $request, $id)
    {
        $positionForm = PositionForm::findOrFail($id);
        $positionForm->update($request->all());

        // ส่งกลับไปยังหน้าที่เหมาะสมหลังจากอัพเดทข้อมูลเสร็จสมบูรณ์
        return redirect()->route('position_form.index')->with('success', 'Position form updated successfully.');
    }

    // แสดงข้อมูลรายการที่ต้องการแก้ไข
    public function edit($id)
    {
        $positionForm = PositionForm::findOrFail($id);
        return view('position_form.edit', compact('positionForm'));
    }

    // อัปเดตข้อมูลในตาราง position_form
    // public function update(Request $request, $id)
    // {
    //     $positionForm = PositionForm::findOrFail($id);
    //     $positionForm->update($request->all());
    //     return redirect()->route('position_form.index')->with('success', 'Position form updated successfully.');
    // }

    // ลบข้อมูลจากตาราง position_form
    public function destroy($id)
    {
        $positionForm = PositionForm::findOrFail($id);
        $positionForm->delete();
        return redirect()->route('position_form.index')->with('success', 'Position form deleted successfully.');
    }
}
