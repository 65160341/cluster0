<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // กำหนดข้อมูลต่างๆ จากฟอร์มที่ส่งมาให้
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->save();

        // หลังจากบันทึกข้อมูลเสร็จแล้ว จะทำการ redirect กลับไปยังหน้าแสดงข้อมูลผู้ใช้พร้อมกับส่งข้อความแจ้งเตือนว่าการเพิ่มผู้ใช้สำเร็จ
        return redirect(url('/main-password'))->with('success', 'User added successfully');
    }
    // ดูข้อมูล
    public function index()
    {
        $users = User::all();
        // ส่งข้อมูลไปหน้า homepage
        return view('main-password', ['users' => $users]);
    }

    // คำสั่งแก้ไขข้อมูล user
    public function edit($id)
    {
        $user = User::find($id);
        // หากผู้ใช้ไม่พบ user จะไปยังหน้า homepage พร้อมกับแสดงข้อความว่า ไม่พบผู้ใช้
        if (!$user) {
            return redirect('/main-password')->with('error', 'User not found.');
        }

        // ไปหน้า editpage
        return view('change-password', compact('user'));
    }
    // อัปเดตข้อมูลของ user || รับพารามิเตอร์ $request  , $id
    public function update(Request $request, $id)
    {
        // รับข้อมูลที่ต้องการอัปเดต
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        // อัปเดตเสร็จะส่งกลับไปหน้า homepage
        $user->save();
        return redirect('/main-password');
    }
}
