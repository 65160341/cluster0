<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authenticate extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    protected $authenticated_username;

    public function login_save(Request $request)
    {
        try {
            $credentials = $request->only('hr_username', 'hr_password');

            if (Auth::guard('hr')->attempt($credentials)) {
                // Retrieve the authenticated user
                $human_resource = Auth::guard('hr')->user();
                // Store the authenticated user's ID in the session
                $request->session()->put('authenticated_username', $human_resource->hr_username);

                return redirect()->route('index');
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('hr')->logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
