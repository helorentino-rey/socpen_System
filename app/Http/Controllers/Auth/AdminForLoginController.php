<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminForLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.admin.admin-login'); // Ensure this view exists
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'employee_id' => ['required', 'regex:/^\d{2}-\d{4}$/'], // Validate correct format
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('admin')->attempt($request->only('employee_id', 'password'))) {
            return redirect()->route('admin.mainDashboard');
        }

        // If authentication fails, return an error message
        return back()->withErrors([
            'login_error' => 'Invalid employee ID or Password.',
        ])->withInput($request->only('employee_id', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
