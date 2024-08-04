<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showApprovalPage()
    {
        // Retrieve all staff members from the database
        $staff = Staff::all();

        // Pass the staff members to the view
        return view('livewire.admin.Dstaff.approve', compact('staff'));
    }


    public function approveStaff($id)
    {
        $staff = Staff::findOrFail($id);

        // Toggle status between 'pending' and 'active'
        $staff->status = $staff->status == 'pending' ? 'active' : 'pending';
        $staff->save();

        $message = $staff->status == 'active' ? 'Staff approved successfully.' : 'Staff deactivated successfully.';

        return redirect()->back()->with('success', $message);
    }
}
