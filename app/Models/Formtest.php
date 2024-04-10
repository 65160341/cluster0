<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'formsTest'; // ปรับชื่อตารางเป็น 'forms'
    protected $primaryKey = 'form_id'; // ระบุ primary key เป็น 'id'
    public $timestamps = false; // ไม่ใช้ timestamps

    protected $fillable = [
        'form_form_id',
        'form_round_count',
        'form_round_year',
        'form_detail',
        'pos_id ',
        'form_position_type',
        'form_amount_of_postion',
        'form_date_start',
        'form_date_end',
        'form_status',
    ];

}
