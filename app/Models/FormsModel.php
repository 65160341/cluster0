<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formsModel extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $primaryKey = 'form_id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'form_id',
        'form_round_count',
        'form_round_year',
        'form_date_start',
        'form_date_end',
        'form_detail',
        'form_status'
    ];
}
