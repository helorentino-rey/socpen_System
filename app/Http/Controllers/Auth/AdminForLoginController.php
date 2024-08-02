<?php

// Controller: AdminForLoginController
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
            'employee_id' => 'required|digits:4',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::guard('admin')->attempt($request->only('employee_id', 'password'))) {
            return redirect()->route('admin.mainDashboard');
        }

        return back()->withErrors(['employee_id' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}