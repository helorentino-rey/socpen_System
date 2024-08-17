<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function store(Request $request)
    {
        // Save the staff data with default 'pending' status
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
            'profile_picture' => $request->file('profile_picture')
                ? $request->file('profile_picture')->store('profile_photos', 'public')
                : null,
            'status' => 'pending', // Set status to pending
        ]);
        // Redirect to the landing page with a success message
        return redirect()->route('landing-page')->with('success', 'Registration successful. Awaiting admin approval.');
    }
    public function dashboard()
    {
        // Return the view for the staff dashboard
        return view('livewire.staff.dashboard'); // Ensure this view exists
    }

    public function show($id)
    {
        $staff = Staff::find($id);

        if ($staff) {
            return response()->json([
                'lastname' => $staff->lastname,
                'firstname' => $staff->firstname,
                'middlename' => $staff->middlename,
                'name_extension' => $staff->name_extension,
                'sex' => $staff->sex,
                'birthday' => $staff->birthday,
                'age' => $staff->age,
                'marital_status' => $staff->marital_status,
                'contact_number' => $staff->contact_number,
                'address' => $staff->address,
                'employee_id' => $staff->employee_id,
                'email' => $staff->email,
                'assigned_province' => $staff->assigned_province,
                'status' => $staff->status,
                'image_url' => $staff->profile_picture ? asset('storage/' . $staff->profile_picture) : null,
            ]);
        }

        return response()->json(['error' => 'Staff not found'], 404);
    }

    public function checkEmployeeId(Request $request)
    {
        $exists = DB::table('staff')->where('employee_id', $request->employee_id)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function listBeneficiary()
    {
        return view('livewire.staff.listbeneficiary');
    }

    public function staffInformation()
    {
        return view('livewire.staff.staffinformation');
    }
}
