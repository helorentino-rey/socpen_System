<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    public function adminDashboard()
    {
        // Your logic here
        return view('livewire.superadmin.dashboard');
    }

    public function adminAccount()
    {
        return view('livewire.superadmin.admin-account');
    }

    public function approvedStaff()
    {
        return view('livewire.superadmin.approved-staff');
    }

    public function approvedBeneficiary()
    {
        return view('livewire.superadmin.approved-beneficiary');
    }

    public function accountInformation()
    {
        return view('livewire.superadmin.account-information');
    }

    public function notifications()
    {
        return view('livewire.superadmin.notifications');
    }
    
    //For Beneficiaries
    public function approve()
    {
        return view('livewire.superadmin.beneficiaries.approve');
    }

    public function create()
    {
        return view('livewire.superadmin.beneficiaries.create');
    }

    public function export()
    {
        return view('livewire.superadmin.beneficiaries.export');
    }

    public function list()
    {
        return view('livewire.superadmin.beneficiaries.list');
    }
}
