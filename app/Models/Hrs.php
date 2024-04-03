<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Hrs extends Model
{
    use HasFactory;
    use Notifiable;
    // protected $primaryKey = 'id';
        protected $fillable = [
        'hr_username',
        'hr_firstname',
        'hr_lastname',
        'password'
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
        return $this->getAttribute('password');
    }
}
