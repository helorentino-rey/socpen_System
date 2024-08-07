<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function resgister()
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
            'age' => 'required|integer|min:0|max:150',
            'marital_status' => 'required|string|max:10',
            'contact_number' => 'required|string|max:11',
            'address' => 'required|string|max:50',
            'employee_id' => 'required|string|max:10|unique:staff',
            'email' => 'required|string|email|max:25|unique:staff',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'assigned_province' => 'required|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
};
