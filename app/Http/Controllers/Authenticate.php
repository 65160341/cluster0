<?php

namespace App\Http\Controllers;

use App\Models\Hrs;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Authenticate extends Controller
{
    public function login()
    {
        return view('auth.v_login');
    }

    protected $authenticated_username;

    public function login_save(Request $request)
    {
        try {
            $request->validate([
                'hr_username' => 'required|string',
                'hr_password' => 'required|string',
            ]);


            $credentials = $request->only('hr_username', 'hr_password');
            $user = Hrs::where('hr_username', $credentials['hr_username'])->first();

            if ($user && $user->hr_password === $credentials['hr_password']) {
                $request->session()->put('authenticated_username', $user->hr_username);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
