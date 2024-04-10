<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosittionTest extends Model
{
    use HasFactory;

    protected $table = 'positionTest';
    protected $primaryKey = 'id'; // ระบุ primary key เป็น 'id'
    public $timestamps = false; // ไม่ใช้ timestamps

    protected $fillable = [
        'id',
        'job_type',
        'pos_id',
        'amount_of_postion'
    ];
    public function positions()
    {
        return $this->belongsTo(Positions::class, 'pos_id');
    }
}
