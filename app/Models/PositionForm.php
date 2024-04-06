<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionForm extends Model
{
    use HasFactory;

    protected $table = 'position_form';

    protected $fillable = [
        'pf_roundcount',
        'pf_date_end',
        'pf_info',
        'pf_type_jobs',
        'pf_amount_of_position',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = true;
}
