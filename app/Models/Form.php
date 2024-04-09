<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms'; // ปรับชื่อตารางเป็น 'forms'
    protected $primaryKey = 'form_roundcount'; // ระบุ primary key เป็น 'id'
    public $timestamps = false; // ไม่ใช้ timestamps

    protected $fillable = [
        'form_roundcount',
        'form_date_start',
        'form_date_end',
    ];
    public function form()
{
    return $this->belongsTo(Form::class, 'form_roundcount');
}
public function positionForm()
{
    return $this->hasOne(PositionForm::class, 'form_id', 'form_id');
}
}
