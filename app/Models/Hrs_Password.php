<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrs_Password extends Model
{
    use HasFactory;

    protected $table = 'hrs';  // กำหนดตารางเป็น users
    protected $primaryKey = 'hr_id'; // กำหนด id เป็น primaryKey


    protected $fillable = [ // กำหนดให้ Laravel รู้ว่าอะไรบ้างสามารถแก้ไขได้
        'hr_username',
        'hr_firstname',
        'hr_lastname',
        'hr_password',
    ];
}
