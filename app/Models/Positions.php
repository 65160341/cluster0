<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
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
    public function positions()
    {
        return $this->belongsTo(Positions::class, 'pos_id');
    }
}
