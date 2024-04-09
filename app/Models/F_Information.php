<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_Information extends Model
{
    use HasFactory;

    protected $table = 'Testforms';
    protected $primaryKey = 'Testforms_id';

    protected $fillable = [
        'Testforms_roundcount',
        'Testforms_detail',
        'Testforms_status',
        'Testforms_status_se'
    ];

    // protected $table = 'applicants';
    // protected $primaryKey = 'app_id';

    // protected $fillable = [
    //     'app_firstname',
    //     'app_age',
    //     'app_edcation',
    //     'app_faculty'
    // ];
}
