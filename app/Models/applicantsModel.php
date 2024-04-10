<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicantsModel extends Model
{
    use HasFactory;
    Protected $table = 'applicants';
    protected $primaryKey = 'app_id';
    public $incrementing = true;
    public $timestamps = true;
}
