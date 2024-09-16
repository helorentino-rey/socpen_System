<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;
use App\Models\Staff;
use App\Models\MothersMaidenName;
use Illuminate\Support\Facades\DB;
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
        $activeBeneficiaries = Beneficiary::where('status', 'ACTIVE')->count();
        $unvalidatedBeneficiaries = Beneficiary::where('status', 'UNVALIDATED')->count();
        $totalStaff = Staff::count();
        $totalBeneficiaries = Beneficiary::count();

        $beneficiariesByProvince = Beneficiary::join('addresses', 'beneficiary.id', '=', 'addresses.beneficiary_id')
            ->where('addresses.type', 'present')
            ->selectRaw('addresses.province, COUNT(*) as count')
            ->groupBy('addresses.province')
            ->pluck('count', 'addresses.province');

        $beneficiariesBySex = MothersMaidenName::select('sex', DB::raw('count(*) as count'))
            ->groupBy('sex')
            ->pluck('count', 'sex');

        $ageDistribution = MothersMaidenName::select('age', DB::raw('count(*) as count'))
            ->groupBy('age')
            ->pluck('count', 'age');

        // Fetch beneficiary registration data grouped by month and year
        $beneficiaryRegistrations = Beneficiary::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Fetch beneficiaries by status and province
        $beneficiariesByStatusAndProvince = Beneficiary::join('addresses', 'beneficiary.id', '=', 'addresses.beneficiary_id')
            ->where('addresses.type', 'present')
            ->selectRaw('addresses.province, beneficiary.status, COUNT(*) as count')
            ->groupBy('addresses.province', 'beneficiary.status')
            ->get()
            ->groupBy('province');

        return view('livewire.superadmin.dashboard', compact(
            'activeBeneficiaries',
            'unvalidatedBeneficiaries',
            'totalStaff',
            'totalBeneficiaries',
            'beneficiariesByProvince',
            'beneficiariesBySex',
            'ageDistribution',
            'beneficiaryRegistrations',
            'beneficiariesByStatusAndProvince' // Pass the new data to the view
        ));
    }
    
    public function showLogs()
    {
        // Path to the log file
        $logFile = storage_path('logs/laravel.log');

        // Read the log file
        $logs = [];
        if (File::exists($logFile)) {
            $logEntries = File::lines($logFile)->toArray();
            foreach ($logEntries as $entry) {
                // Extract the timestamp and convert it to Philippine time
                if (preg_match('/^\[(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\]/', $entry, $matches)) {
                    $timestamp = $matches[1];
                    $localTime = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'UTC')->setTimezone('Asia/Manila');
                    $entry = str_replace($timestamp, $localTime->format('Y-m-d H:i:s'), $entry);
                }
                $logs[] = $entry;
            }
        }

        // Pass logs to the view
        return view('livewire.superadmin.notifications', compact('logs'));
    }
}
