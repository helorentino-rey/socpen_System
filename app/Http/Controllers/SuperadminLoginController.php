<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SuperadminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.superadmin.superadmin-login'); // Update to match your view location
    }

    public function login(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'password' => 'required',
        ]);
    
        $superAdmin = SuperAdmin::where('employee_id', $request->employee_id)->first();
    
        if ($superAdmin && Hash::check($request->password, $superAdmin->password)) {
            Auth::guard('superadmin')->login($superAdmin);
    
            // Use the correct route name without extra prefixes
            return redirect()->route('superadmin.dashboard')->with('success', 'Welcome Super Admin!');
        } else {
            return back()->withErrors(['login_error' => 'Invalid Employee ID or Password']);
        }
    }

    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect()->route('superadmin.login');
    }
};
