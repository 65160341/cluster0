<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formsModel extends Model
{
    use HasFactory;
    Protected $table = 'forms';
    protected $primaryKey = 'form_id';
}
