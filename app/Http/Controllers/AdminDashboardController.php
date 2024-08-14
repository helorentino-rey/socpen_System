<?php

// App/Http/Controllers/AdminDashboardController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('livewire.admin.mainDashboard'); // Ensure this view exists
    }

    public function mDashboard()
    {
        return view('livewire.admin.dashboard');
    }

    public function searchBeneficiaries()
    {
        return view('livewire.admin.beneficiaries.search');
    }

    public function approveBeneficiaries()
    {
        return view('livewire.admin.beneficiaries.approve');
    }

    public function create()
    {
        return view('livewire.admin.beneficiaries.create');
    }

    public function export()
    {
        return view('livewire.admin.beneficiaries.export');
    }

    public function listBeneficiaries()
    {
        return view('livewire.admin.beneficiaries.list');
    }

    public function approveStaff()
    {
        return view('livewire.admin.Dstaff.approve');
    }

    public function listStaff()
    {
        return view('livewire.admin.Dstaff.list');
    }

    public function accountInformation()
    {
        return view('livewire.admin.account');
    }
}
