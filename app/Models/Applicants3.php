<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants3 extends Model
{
    use HasFactory;
    protected $table ='applicants';
    protected $primaryKey = 'app_id';
}
