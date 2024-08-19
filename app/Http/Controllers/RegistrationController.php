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
        // Validation
        $messages = [
            'email.unique' => 'The email address has already been taken.',
            'employee_id.unique' => 'The employee ID has already been taken.',
        ];

        $validatedData = $request->validate([
            'lastname' => 'required|string|max:15',
            'firstname' => 'required|string|max:15',
            'middlename' => 'nullable|string|max:15',
            'name_extension' => 'nullable|string|max:4',
            'sex' => 'required|string|in:Male,Female,Prefer not to say', // Updated validation rule
            'birthday' => 'required|date',
            'age' => 'required|integer|min:0',
            'marital_status' => 'required|string|max:10',
            'contact_number' => 'required|string|max:13',
            'address' => 'required|string|max:50',
            'employee_id' => 'required|string|max:10|unique:staff',
            'email' => 'required|string|email|max:25|unique:staff',
            'password' => 'required|string|min:8|confirmed',
            'assigned_province' => 'required|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        // Create new staff instance
        $staff = new Staff();
        $staff->fill($validatedData);
        $staff->password = Hash::make($request->password);

        // Handle profile picture
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $staff->profile_picture = $path;
        }

        // Set status to pending
        $staff->status = 'pending';

        // Save staff record
        $staff->save();

        return redirect()->route('landing-page')->with('success', 'Registration successful. Awaiting admin approval.');
    }

    public function checkEmail(Request $request)
    {
        $exists = Staff::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkEmployeeId(Request $request)
    {
        $exists = Staff::where('employee_id', $request->employee_id)->exists();
        return response()->json(['exists' => $exists]);
    }
}
