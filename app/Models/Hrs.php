<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrs extends Model
{
    use HasFactory;
        protected $fillable = [
        'hr_id',
        'hr_username',
        'hr_firstname',
        'hr_lastname',
        'hr_password'
    ];
    public function getAuthIdentifierName()
    {
        return 'hr_username';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getAttribute('hr_username');
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->getAttribute('hr_password');
    }
}
