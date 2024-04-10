<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forms extends Model
{
    use HasFactory;

    protected $table = 'forms';
    protected $primaryKey = 'form_id';

    protected $fillable = [
        'form_round_count',
        'form_round_year',
    ];
}
