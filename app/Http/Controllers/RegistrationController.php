<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register()
    {
        return view('livewire.staff.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|max:15',
            'firstname' => 'required|string|max:15',
            'middlename' => 'nullable|string|max:15',
            'name_extension' => 'nullable|string|max:4',
            'sex' => 'required|string|in:Male,Female',
            'birthday' => 'required|date',
            'age' => 'required|integer|min:0',
            'marital_status' => 'required|string|max:10',
            'contact_number' => 'required|string|max:11',
            'address' => 'required|string|max:50',
            'employee_id' => 'required|string|max:10|unique:staff',
            'email' => 'required|string|email|max:25|unique:staff',
            'password' => 'required|string|min:8|confirmed',
            'assigned_province' => 'required|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $staff = new Staff();
        $staff->lastname = $request->lastname;
        $staff->firstname = $request->firstname;
        $staff->middlename = $request->middlename;
        $staff->name_extension = $request->name_extension;
        $staff->sex = $request->sex;
        $staff->birthday = $request->birthday;
        $staff->age = $request->age;
        $staff->marital_status = $request->marital_status;
        $staff->contact_number = $request->contact_number;
        $staff->address = $request->address;
        $staff->employee_id = $request->employee_id;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->assigned_province = $request->assigned_province;

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $staff->profile_picture = $path;
        }

        $staff->save();

        return redirect()->route('register.success');
    }
}
