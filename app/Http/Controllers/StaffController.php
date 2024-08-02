<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function store(Request $request)
    {
        // Save the staff data
        Staff::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'name_extension' => $request->name_extension,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'age' => $request->age,
            'marital_status' => $request->marital_status,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'assigned_province' => $request->assigned_province,
            'profile_photo_path' => $request->file('profile_photo')
                ? $request->file('profile_photo')->store('profile_photos', 'public')
                : null,
        ]);

        return redirect()->route('staff.login')->with('success', 'Registration successful. Awaiting admin approval.');
    }
}
