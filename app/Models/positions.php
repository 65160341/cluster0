<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class positions extends Model
{
    use HasFactory;

    protected $table = 'positions';
    protected $primaryKey = 'pos_id ';

    protected $fillable = [
        'pos_id',
        'pos_name',
        'pos_url',
    ];
}

