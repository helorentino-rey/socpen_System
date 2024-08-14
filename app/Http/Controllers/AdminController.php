<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showApprovalPage()
    {
        // Retrieve all staff members from the database
        $staff = Staff::all();

        // Pass the staff members to the view
        return view('livewire.superadmin.approved-staff', compact('staff'));
    }
    public function approveStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->status = $staff->status == 'pending' ? 'active' : 'pending';
        $staff->save();

        $message = $staff->status == 'active' ? 'Staff approved successfully.' : 'Staff deactivated successfully.';

        return redirect()->back()->with('success', $message);
    }

    public function getStaffDetails($id)
    {
        $staff = Staff::findOrFail($id);
        return response()->json($staff);
    }

    //For Admin Account
    public function showAdminPage()
    {
        $admins = Admin::all();
        return view('livewire.superadmin.admin-account', compact('admins'));
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:admins',
            'password' => 'required|min:8',
        ]);

        Admin::create([
            'employee_id' => $request->employee_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Admin created successfully.');
    }

    public function editAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'employee_id' => 'required|unique:admins,employee_id,' . $admin->id,
            'password' => 'nullable|min:6',
        ]);

        $admin->employee_id = $request->employee_id;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->back()->with('success', 'Admin updated successfully.');
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully.');
    }

    public function toggleAdminStatus($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->status = $admin->status == 'active' ? 'inactive' : 'active';
        $admin->save();

        $message = $admin->status == 'active' ? 'Admin activated successfully.' : 'Admin deactivated successfully.';
        return redirect()->back()->with('success', $message);
    }
}