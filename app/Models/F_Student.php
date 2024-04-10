<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_Student extends Model
{
    use HasFactory;

    protected $table = 'forms';
    protected $primaryKey = 'form_id ';

    protected $fillable = [
        'form_id ',
        'form_round ',
        'form_date_start',
        'form_date_end',
        'form_detail'
    ];
}
