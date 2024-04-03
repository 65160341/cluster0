<?php

namespace App\Auth;


use App\Models\Hrs;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HR_provider implements UserProvider
{
       public function retrieveById($identifier)
    {
        return Hrs::find($identifier);
    }
    public function retrieveByUsername($identifier)
    {
        return Hrs::where('hr_username', $identifier)->first();
    }

    public function retrieveByToken($identifier, $token)
    {
        // Not needed for this example
    }
    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Here you can update the "remember me" token for the user in your database
        // This method is typically used in token-based authentication systems
        // If you're not using token-based authentication, you may leave this method empty
    }

    public function retrieveByCredentials(array $credentials)
    {
        return Hrs::where('hr_username', $credentials['hr_username'])->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {

        $passwordMatch = Hash::check($credentials['password'], $user->getAuthPassword());
        Log::info('Password check result: ' . ($passwordMatch ? 'Matched' : 'Not matched'));
        return $passwordMatch;
    }
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
     {

     }
}
