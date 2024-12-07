<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Staff;
use App\Models\MothersMaidenName;
use Illuminate\Support\Facades\DB;
use App\Models\Log;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class SuperAdminDashboardController extends Controller
{
    public function superadminHome()
    {
        // Your logic here
        return view('livewire.superadmin.home');
    }

    public function superadminDashboard()
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

    public function kpi()
    {
        // Count active beneficiaries
        $activeBeneficiaries = Beneficiary::where('status', 'ACTIVE')->count();
    
        // Count unvalidated beneficiaries
        $unvalidatedBeneficiaries = Beneficiary::where('status', 'UNVALIDATED')->count();
    
        // Define the other statuses
        $statuses = [
            'WAITLISTED',
            'SUSPENDED',
            'NOT LOCATED',
            'DOUBLE ENTRY',
            'TRANSFER OF RESIDENCE',
            'RECEIVING SUPPORT FROM THE FAMILY',
            'RECEIVING PENSION FROM OTHER AGENCY',
            'WITH PERMANENT INCOME'
        ];
    
        // Count beneficiaries with 'other' statuses
        $otherBeneficiaries = Beneficiary::whereIn('status', $statuses)->count();
    
        // Count total staff
        $totalStaff = Staff::count();
    
        // Count total beneficiaries
        $totalBeneficiaries = Beneficiary::count();
    
        // Beneficiaries by province
        $beneficiariesByProvince = Beneficiary::join('addresses', 'beneficiary.id', '=', 'addresses.beneficiary_id')
            ->where('addresses.type', 'present')
            ->selectRaw('addresses.province, COUNT(*) as count')
            ->groupBy('addresses.province')
            ->pluck('count', 'addresses.province');
    
        // Beneficiaries by sex
        $beneficiariesBySex = MothersMaidenName::select('sex', DB::raw('count(*) as count'))
            ->groupBy('sex')
            ->pluck('count', 'sex');
    
        // Age distribution
        $ageDistribution = MothersMaidenName::select(
            DB::raw('FLOOR(age / 6) * 6 as age_range'),
            DB::raw('count(*) as count')
        )
        ->groupBy('age_range')
        ->pluck('count', 'age_range');
    
        // Beneficiary registrations by month/year
        $beneficiaryRegistrations = Beneficiary::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
    
        // Beneficiaries by status and province
        $beneficiariesByStatusAndProvince = Beneficiary::join('addresses', 'beneficiary.id', '=', 'addresses.beneficiary_id')
            ->where('addresses.type', 'present')
            ->selectRaw('addresses.province, beneficiary.status, COUNT(*) as count')
            ->groupBy('addresses.province', 'beneficiary.status')
            ->get()
            ->groupBy('province');
    
        return view('livewire.superadmin.dashboard', compact(
            'activeBeneficiaries',
            'unvalidatedBeneficiaries',
            'otherBeneficiaries',
            'totalStaff',
            'totalBeneficiaries',
            'beneficiariesByProvince',
            'beneficiariesBySex',
            'ageDistribution',
            'beneficiaryRegistrations',
            'beneficiariesByStatusAndProvince'
        ));
    }    
}
