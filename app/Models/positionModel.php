<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class positionModel extends Model
{
    use HasFactory;

    protected $table = 'positions';
    protected $primaryKey = 'pos_id'; // ระบุ primary key เป็น 'id'
    public $timestamps = false; // ไม่ใช้ timestamps

    protected $fillable = [
        'pos_id',
        'pos_name',
        'pos_url',
    ];
}
