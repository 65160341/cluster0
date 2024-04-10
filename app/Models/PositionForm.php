<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionForm extends Model
{
    use HasFactory;

    protected $table = 'position_form';
    public $timestamps = false; // ไม่ใช้ timestamps

    protected $fillable = [
        'pf_type_jobs',
        'pf_amount_of_position',
        'pos_id',
        'form_roundcount',
    ];

public function positions()
{
    return $this->belongsTo(Positions::class, 'pos_id');
}
public function form()
{
    return $this->belongsTo(Form::class, 'form_id');
}
}
