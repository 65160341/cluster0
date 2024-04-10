<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_positions extends Model
{
    use HasFactory;

    protected $table = 'form_positions';
    protected $primaryKey = 'form_id';

    protected $fillable = [
        'fp_detail',
        'fp_status',
        'fp_date_start',
        'fp_date_end'
    ];

    public function form()
    {
        return $this->belongsTo(forms::class, 'form_id', 'form_id');
    }
}
