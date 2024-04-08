<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilemodel extends Model
{
    use HasFactory;
    protected $table = 'hrs';
    protected $primaryKey = 'hr_id';

    protected $fillable = [
        'hr_id',
        'hr_username',
        'hr_firstname',
        'hr_lastname',
        'hr_passeord',
    ];
}
?>