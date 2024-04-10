<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // เพิ่มบรรทัดนี้เพื่อ import Model User

class DashboardController extends Controller
{
    public function userChart(){
        // ดึงข้อมูลผู้ใช้ที่สร้างในแต่ละเดือนสำหรับปีปัจจุบัน
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();
                        
        $labels = []; // อาร์เรย์สำหรับเก็บชื่อเดือน
        $data = []; // อาร์เรย์สำหรับเก็บจำนวนผู้ใช้
        $colors = ['#2d4f8f','#ff9248','#007760']; // สีพื้นหลังแต่ละแถวข้อมูล

        // วนลูปเพื่อสร้างข้อมูลสำหรับแผนภูมิ
        for ($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1)); // แปลงตัวเลขเดือนเป็นชื่อเดือน (เช่น 1 -> January)
            $count = 0;

            // หาจำนวนผู้ใช้สำหรับแต่ละเดือน
            foreach($users as $user){
                if($user->month == $i){
                    $count = $user->count;
                    break;
                }
            }

            // เพิ่มชื่อเดือนและจำนวนผู้ใช้ลงในอาร์เรย์
            array_push($labels,$month);
            array_push($data, $count);
        }

        // ข้อมูลสำหรับแสดงในแผนภูมิ
        //แก้ที่แสดงในตาราง
        $datasets = [
            [
                'label' => 'จำนวนที่เปิดรับ', // ชื่อของแถวข้อมูล
                'data' => $data, // ข้อมูล (จำนวนผู้ใช้)
                'backgroundColor' => $colors[0] // สีพื้นหลังของแถวข้อมูล
            ],
            [
                'label' => 'จำนวนผู้สมัคร', // ชื่อของแถวข้อมูล
                'data' => $data,
                'backgroundColor' => $colors[1]
            ],
            [
                'label' => 'ผู้สมัครที่ตอบกลับ', // ชื่อของแถวข้อมูล
                'data' => $data,
                'backgroundColor' => $colors[2]
            ],


        ];

        // ส่งข้อมูลไปยัง view ที่ชื่อ 'charts'
        return view('dashboard', compact('datasets','labels'));
    }
}
