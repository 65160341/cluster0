<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PositionForm;
use App\Models\Positions;
use App\Models\Form;
class position_form_controller extends Controller
{// ดึงข้อมูลทั้งหมดจากตาราง position_form
    public function index()
{
    $positionForms = PositionForm::with(['Form', 'Positions'])->get();
    return view('creatform', compact('positionForms'));
}
    // แสดงฟอร์มสำหรับเพิ่มข้อมูล
    public function create()
    {
        return view('creatform');
    }
    public function createform()
    {
    $positionForms = position_form::all(); // ดึงข้อมูลจากฐานข้อมูล
    return view('creatform', compact('positionForms'));
}

    // บันทึกข้อมูลใหม่ลงในตาราง position_form
    public function store(Request $request)
{
    $latestId = PositionForm::orderBy('id', 'desc')->value('id');

        // หากไม่มีข้อมูลในตารางให้กำหนด id เริ่มต้นเป็น 1
        if(!$latestId) {
            $latestId = 1;
        } else {
            // มีข้อมูลในตาราง ให้เพิ่มค่า id ที่ใช้งานล่าสุดไป 1
            $latestId++;
        }

        $positionForm = new PositionForm();
        $positionForm->id = $latestId;
        $positionForm->pf_roundcount = $request->input('pf_roundcount');
        $positionForm->pf_date_end = $request->input('fp_date_end');
        $positionForm->pf_info = $request->input('pf_info');
        $positionForm->save();

    // ส่งกลับไปยังหน้าที่เหมาะสมหลังจากบันทึกข้อมูลเสร็จสมบูรณ์
    return redirect('/');
}

    // แสดงข้อมูลรายการที่ต้องการแก้ไข
    public function edit($id)
    {
        $positionForm = PositionForm::findOrFail($id);
        return view('position_form.edit', compact('positionForm'));
    }

    // อัปเดตข้อมูลในตาราง position_form
    public function update(Request $request, $id)
    {
        $positionForm = PositionForm::findOrFail($id);
        $positionForm->update($request->all());
        return redirect()->route('position_form.index')->with('success', 'Position form updated successfully.');
    }

    // ลบข้อมูลจากตาราง position_form
    public function destroy($id)
    {
        $positionForm = PositionForm::findOrFail($id);
        $positionForm->delete();
        return redirect()->route('position_form.index')->with('success', 'Position form deleted successfully.');
    }
}
