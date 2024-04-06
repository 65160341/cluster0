<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PositionForm;

class position_form_controller extends Controller
{
    // ดึงข้อมูลทั้งหมดจากตาราง position_form
    public function index()
{
    $positionForms = PositionForm::all();
    return view('creteforms', compact('positionForms'));
}

    // แสดงฟอร์มสำหรับเพิ่มข้อมูล
    public function create()
    {
        return view('creatform');
    }

    // บันทึกข้อมูลใหม่ลงในตาราง position_form
    public function store(Request $request)
    {
        $latestId = UsersInfo::orderBy('id', 'desc')->value('id');
         // หากไม่มีข้อมูลในตารางให้กำหนด id เริ่มต้นเป็น 1
         if(!$latestId) {
            $latestId = 1;
        } else {
            // มีข้อมูลในตาราง ให้เพิ่มค่า id ที่ใช้งานล่าสุดไป 1
            $latestId++;
        }
        PositionForm::create($request->all());
        return redirect()->route('main')->with('success', 'Position form created successfully.');
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
