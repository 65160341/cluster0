<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms'; // ปรับชื่อตารางเป็น 'forms'
    protected $primaryKey = 'form_id'; // ระบุ primary key เป็น 'id'
    public $timestamps = false; // ไม่ใช้ timestamps

    protected $fillable = [
        'form_id',
        'form_roundcount',
        'form_date_end',
        'form_info',
    ];
    public function positionForms()
{
    return $this->hasMany(PositionForm::class, 'form_id');
}
}
