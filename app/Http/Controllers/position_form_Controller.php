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
        $latestId = Form::max('form_id');

// กำหนดค่า 'form_id' ใหม่โดยเพิ่มค่าล่าสุดขึ้นไปหนึ่ง
$latestId++;


        // // Create and save a new form
        $form = new Form();
        $form->form_id = $latestId;
        $form->form_date_start = now();
        $form->form_roundcount = $request->input('form_roundcount');
        $form->form_date_end = $request->input('form_date_end') ?? now();
        $form->save();

        // Create and save a new position form
        $positionForms = new PositionForm();
        $positionForms->pf_info = $request->input('pf_info');
        $positionForms->pf_type_jobs = $request->input('pf_type_jobs');
        $positionForms->pos_id = $request->input('pos_id');
        $positionForms->pf_amount_of_position = $request->input('pf_amount_of_position');
        $positionForms->form_id = $form->form_id;
        $positionForms->save();

        // Return to the desired view
        return redirect('/');
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
