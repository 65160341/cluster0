<?php

namespace App\Http\Controllers;

use App\Models\Hrs_Password;
use Illuminate\Http\Request;

class P_Password extends Controller
{
    public function store(Request $request)
    {
        // กำหนดข้อมูลต่างๆ จากฟอร์มที่ส่งมาให้
        $hrs = new Hrs_Password;
        $hrs->hr_username = $request->input('hr_username');
        $hrs->hr_firstname = $request->input('hr_firstname');
        $hrs->hr_lastname = $request->input('hr_lastname');
        $hrs->hr_password = $request->input('hr_password');
        $hrs->save();


        // หลังจากบันทึกข้อมูลเสร็จแล้ว จะทำการ redirect กลับไปยังหน้าแสดงข้อมูลผู้ใช้พร้อมกับส่งข้อความแจ้งเตือนว่าการเพิ่มผู้ใช้สำเร็จ
        return redirect(url('/main-password'))->with('success', 'User added successfully');
    }

    // ดูข้อมูล
    public function index()
    {
        $hrs = Hrs_Password::all();
        // ส่งข้อมูลไปหน้า homepage
        return view('main-password', ['hrs' => $hrs]);
    }

    // คำสั่งแก้ไขข้อมูล hrs
    public function edit($hr_id)
    {
        $hrs = Hrs_Password::find($hr_id);
        // หากผู้ใช้ไม่พบ hrs จะไปยังหน้า homepage พร้อมกับแสดงข้อความว่า ไม่พบผู้ใช้
        if (!$hrs) {
            return redirect('/main-password')->with('error', 'hrs not found.');
        }

        // ไปหน้า editpage
        return view('change-password', compact('hrs'));
    }

    public function update(Request $request, $hr_id)
    {
        // รับข้อมูลที่ต้องการอัปเดต
        $hrs = Hrs_Password::find($hr_id);

        // ตรวจสอบว่ามีข้อมูลที่ถูกส่งมาหรือไม่ก่อนที่จะทำการอัปเดต
        if ($request->filled('hr_username')) {
            $hrs->hr_username = $request->input('hr_username');
        }
        if ($request->filled('hr_firstname')) {
            $hrs->hr_firstname = $request->input('hr_firstname');
        }
        if ($request->filled('hr_lastname')) {
            $hrs->hr_lastname = $request->input('hr_lastname');
        }
        if ($request->filled('hr_password')) {
            $hrs->hr_password = $request->input('hr_password');
        }

        // อัปเดตเสร็จจะส่งกลับไปยังหน้า homepage
        $hrs->save();

        return redirect('/main-password');
    }

    public function delete($hr_id)
    {
        // พบผู้ใช้งาน
        $hrs = Hrs_Password::find($hr_id);
        // หากผู้ใช้ไม่พบผู้ใช้ จะไปยังหน้า homepage พร้อมกับแสดงข้อความว่า ไม่พบผู้ใช้
        if (!$hrs) {
            return redirect('/main-password')->with('error', 'User not found.');
        }

        // ลบผู้ใช้งาน
        $hrs->delete();

        // หลังจากลบเสร็จแล้วจะส่งค่าไปที่ JSON จะแสดงข้อความว่าเสร็จสิ้น
        return response()->json(['success' => true]);
    }
}
