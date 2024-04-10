<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Student extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    protected $primaryKey = 'app_id';

    protected $fillable = [
        'app_id',
        'app_firstname',
        'app_age',
        'app_email',
        'app_education',
        'app_faculty',
        'app_major',
        'app_require_salary',
        'app_question',
        'app_resume',
        'app_status',
        'app_selected',
        'pos_id',
        'hr_id',
        'updated_at',

    ];

    public function position()
    {
        return $this->belongsTo(positionModel::class, 'pos_id', 'pos_id');
    }


}

?>
