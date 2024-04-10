<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // เพิ่มบรรทัดนี้เพื่อ import Model User
use App\Models\Applicants; // เพิ่มบรรทัดนี้เพื่อ import Model User
use App\Models\Applicants2; // เพิ่มบรรทัดนี้เพื่อ import Model User
use App\Models\Applicants3; // เพิ่มบรรทัดนี้เพื่อ import Model User

class DashboardController extends Controller
{
    public function userChart(){
        // ดึงข้อมูลผู้ใช้ที่สร้างในแต่ละเดือนสำหรับปีปัจจุบัน
        $users = Applicants::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

        $applicants2 = Applicants2::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

        $applicants3 = Applicants3::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

        $labels = []; // อาร์เรย์สำหรับเก็บชื่อเดือน
        $data = []; // อาร์เรย์สำหรับเก็บจำนวนผู้ใช้
        $data2 = []; // Array to store counts for Applicants2
        $data3 = []; // Array to store counts for Applicants3
        $colors = ['#2d4f8f','#ff9248','#007760']; // สีพื้นหลังแต่ละแถวข้อมูล

        // วนลูปเพื่อสร้างข้อมูลสำหรับแผนภูมิ
        for ($i=1; $i < 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1)); // แปลงตัวเลขเดือนเป็นชื่อเดือน (เช่น 1 -> January)
            $count1 = 0;
            $count2 = 0;
            $count3 = 0;

            // หาจำนวนผู้ใช้สำหรับแต่ละเดือน
            foreach($users as $user){
                if($user->month == $i){
                    $count1 = $user->count;
                    break;
                }
            }

            // Find the counts for Applicants2 for each month
            foreach($applicants2 as $applicant2){
                if ($applicant2->month == $i) {
                    $count2 = $applicant2->count;
                    break;
                }
            }

            // Find the counts for Applicants2 for each month
            foreach($applicants3 as $applicant3){
                if ($applicant3->month == $i) {
                    $count3 = $applicant3->count;
                    break;
                }
            }

            // เพิ่มชื่อเดือนและจำนวนผู้ใช้ลงในอาร์เรย์
            array_push($labels,$month);
            array_push($data, $count1);
            array_push($data2, $count2);
            array_push($data3, $count3);
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
                'data' => $data2,
                'backgroundColor' => $colors[1]
            ],[
                'label' => 'จำนวนผู้สมัคร', // ชื่อของแถวข้อมูล
                'data' => $data3,
                'backgroundColor' => $colors[2]
            ],
        ];



        // ส่งข้อมูลไปยัง view ที่ชื่อ 'charts'
        return view('dashboard', compact('datasets','labels'));
    }
}
