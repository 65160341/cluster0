<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formPositionsModel extends Model
{
    use HasFactory;
    protected $table = 'form_positions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'form_id',
        'pos_id',
        'fp_amount_of_postion',
        'id',
        'fp_position_type'
    ];

    // Define relationship with formsModel
    public function form()
    {
        return $this->belongsTo(formsModel::class, 'form_id', 'form_id');
    }

    // Define relationship with Positions
    public function position()
    {
        return $this->belongsTo(Positions::class, 'pos_id', 'pos_id');
    }
}
