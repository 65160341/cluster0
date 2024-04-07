<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Student extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    protected $primaryKey = 'app_id';

    protected $fillable = [
        'app_id',
        'app_firstname',
        'app_age',
        'app_email',
        'app_question'
    ];
}
