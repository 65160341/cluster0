<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_PositionsModel extends Model
{
    use HasFactory;

    protected $table ='form_positions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'pos_id',
        'fp_amount_of_postion',
        'fp_detail',
        'fp_status',
        'id',
        'fp_position_type'
    ];

    public function form()
    {
        return $this->belongsTo(FormsModel::class, 'form_id', 'form_id');
    }
}
