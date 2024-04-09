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

public function store(Request $request) {
    // ตรวจสอบว่ามีข้อมูลที่ส่งมาจากฟอร์มหรือไม่
    if ($request->has('pf_type_jobs') && $request->has('pos_id') && $request->has('pf_amount_of_position')) {
        // ดึงข้อมูลจากฟอร์ม
        $pf_type_jobs = $request->input('pf_type_jobs');
        $pos_id = $request->input('pos_id');
        $pf_amount_of_position = $request->input('pf_amount_of_position');

        // ตรวจสอบว่าข้อมูลมีค่าเป็น array หรือไม่
        if (is_array($pf_type_jobs) && is_array($pos_id) && is_array($pf_amount_of_position)) {
            // สร้างอาร์เรย์ข้อมูลจากข้อมูลที่ได้รับ
            $formData = [];
            foreach ($pf_type_jobs as $key => $value) {
                $formData[] = [
                    'pf_type_jobs' => $value,
                    'pos_id' => $pos_id[$key],
                    'pf_amount_of_position' => $pf_amount_of_position[$key]
                ];
            }
            $formData -> save

            // ส่งข้อมูลไปยังหน้าเว็บ
            return view('creatform')->with('formData', $formData);
        } else {
            // กรณีข้อมูลไม่ใช่ array
            return back()->withInput()->withErrors(['message' => 'ข้อมูลที่ส่งมาจากฟอร์มไม่ถูกต้อง']);
        }
    } else {
        // กรณีไม่มีข้อมูลที่ส่งมาจากฟอร์ม
        return back()->withInput()->withErrors(['message' => 'ไม่พบข้อมูลที่ส่งมาจากฟอร์ม']);
    }
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
