<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.staff.staff-login');
    }

    public function login(Request $request)
    {
        $staff = Staff::where('employee_id', $request->employee_id)->first();

        if ($staff && Hash::check($request->password, $staff->password)) {
            if ($staff->status === 'active') {
                Auth::login($staff);
                return redirect()->route('staff.dashboard');
            } else {
                // Set session error message for awaiting approval
                return redirect()->back()->with('error', 'Your account is awaiting admin approval.');
            }
        }

        // Set session error message for invalid credentials
        return redirect()->back()->with('error', 'Invalid credentials :(');
    }


    public function showApprovalPage()
    {
        $staff = Staff::all();
        return view('livewire.admin.Dstaff.approve', compact('staff'));
    }
}
