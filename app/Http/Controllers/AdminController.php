<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show the staff approval page
    public function showApprovalPage()
    {
        // Retrieve all staff members from the database
        $staff = Staff::all();

        // Pass the staff members to the view
        return view('livewire.superadmin.approved-staff', compact('staff'));
    }

    // Approve or deactivate staff
    public function approveStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->status = $staff->status == 'pending' ? 'active' : 'pending';
        $staff->save();

        $message = $staff->status == 'active' ? 'Staff approved successfully.' : 'Staff deactivated successfully.';

        return redirect()->back()->with('success', $message);
    }

    // Get staff details in JSON format
    public function getStaffDetails($id)
    {
        $staff = Staff::findOrFail($id);
        return response()->json($staff);
    }

    // Show the admin account management page
    public function showAdminPage()
    {
        $admins = Admin::all();
        return view('livewire.superadmin.admin-account', compact('admins'));
        
    }

    // Create a new admin
    public function createAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:15',
            'employee_id' => 'required|unique:admins',
            'password' => 'required|min:8',
            'province' => 'required|string|max:50',
        ]);

        Admin::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'password' => Hash::make($request->password), // Hash the password
            'assigned_province' => $request->province,
            'is_active' => true, // Set the default status to active
        ]);

        return redirect()->back()->with('success', 'Admin created successfully.');
    }

    // Edit an existing admin's details
    public function editAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:15',
            'employee_id' => 'required|unique:admins,employee_id,' . $admin->id,
            'password' => 'nullable|min:8',
            'province' => 'required|string|max:50',
        ]);

        $admin->name = $request->name;
        $admin->employee_id = $request->employee_id;

        if ($request->password) {
            $admin->password = Hash::make($request->password); // Hash the updated password
        }

        $admin->assigned_province = $request->province;
        $admin->save();

        return redirect()->back()->with('success', 'Admin updated successfully.');
    }

    // Delete an admin
    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully.');
    }

    // Toggle an admin's active status
    public function toggleAdminStatus($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->is_active = !$admin->is_active;
        $admin->save();

        $message = $admin->is_active ? 'Admin activated successfully.' : 'Admin deactivated successfully.';
        return redirect()->back()->with('success', $message);
    }

    // Reset an admin's password
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:8',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->back()->with('success', 'Password reset successfully.');
    }
}
