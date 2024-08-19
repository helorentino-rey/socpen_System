<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
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

    public function listBeneficiary()
    {
        return view('livewire.staff.listbeneficiary');
    }

    public function staffInformation()
    {
        return view('livewire.staff.staffinformation');
    }
}
