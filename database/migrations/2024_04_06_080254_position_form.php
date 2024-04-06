<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('position_form', function (Blueprint $table) {
            $table->id(); // ใช้คำสั่งนี้เพื่อสร้าง primary key ที่เป็น auto-increment
            $table->string('pf_roundcount'); // เพิ่มคอลัมน์สำหรับรอบการรับสมัคร
            $table->date('pf_date_end'); // เพิ่มคอลัมน์สำหรับระยะเวลาการรับสมัคร
            $table->string('pf_info'); // เพิ่มคอลัมน์สำหรับรายละเอียดเพิ่มเติม
            $table->string('pf_type_jobs'); // เพิ่มคอลัมน์สำหรับลักษณะงาน
            $table->integer('pf_amount_of_position'); // เพิ่มคอลัมน์สำหรับจำนวนการรับสมัคร
            $table->timestamps(); // เพิ่มคอลัมน์สำหรับการบันทึกวันที่สร้างและปรับปรุง
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_form');
    }
};
