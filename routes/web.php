<?php

use App\Livewire\LandingPage;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminForLoginController;
use App\Http\Controllers\SuperadminLoginController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffLoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\getAddressOptions;
use App\Http\Controllers\OtpController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//To add- Dashboard with authentication
// });
    
//Route for Landing Page
Route::get('/', function () {
    return view('livewire.landing-page');
})->name('landing-page');

// Login and Logout Routes
Route::post('/new-login', [LoginController::class, 'login'])->name('new-login');
Route::post('/logout/superadmin', [LoginController::class, 'superadminLogout'])->name('superadmin.logout');
Route::post('/logout/admin', [LoginController::class, 'adminLogout'])->name('admin.logout');
Route::post('/logout/staff', [LoginController::class, 'staffLogout'])->name('staff.logout');

// OTP Verification Route
Route::get('/staff/otp-verify', [LoginController::class, 'showOtpForm'])->name('staff.otp.verify');
Route::post('/staff/otp-verify', [LoginController::class, 'verifyOtp']);
Route::post('/staff/otp/send', [LoginController::class, 'sendOtp'])->name('staff.otp.send');

//Super admin Dashboard Controller
Route::get('/superadmin/dashboard', [SuperAdminDashboardController::class, 'adminDashboard'])->name('superadmin.dashboard');
Route::get('/superadmin/admin-account', [SuperAdminDashboardController::class, 'adminAccount'])->name('superadmin.admin-account');
Route::get('/superadmin/approved-staff', [SuperAdminDashboardController::class, 'approvedStaff'])->name('superadmin.approved-staff');
Route::get('/superadmin/approved-beneficiary', [SuperAdminDashboardController::class, 'approvedBeneficiary'])->name('superadmin.approved-beneficiary');
Route::get('/superadmin/account-information', [SuperAdminDashboardController::class, 'accountInformation'])->name('superadmin.account-information');
Route::get('/superadmin/notifications', [SuperAdminDashboardController::class, 'notifications'])->name('superadmin.notifications');

//Staff Register
Route::post('new-register', function () {
    return view('livewire.staff.register');
})->name('new-register');

//Route to Save in the Database
Route::post('/register', [StaffController::class, 'store'])->name('register.submit');

//Route for Check Email Duplication in Staff Registration
Route::post('/check-email', [RegistrationController::class, 'checkEmail']);
Route::post('/check-employee-id', [RegistrationController::class, 'checkEmployeeId']);

//Route for Dashboard
Route::get('/dashboard', [AdminDashboardController::class, 'mDashboard'])->name('admin.dashboard');
Route::get('/beneficiaries/export', [AdminDashboardController::class, 'export'])->name('admin.beneficiaries.export');
Route::get('/beneficiaries/approve', [AdminDashboardController::class, 'approveBeneficiaries'])->name('admin.beneficiaries.approve');
Route::get('/beneficiaries/create', [AdminDashboardController::class, 'create'])->name('admin.beneficiaries.create');
Route::get('/beneficiaries/list', [AdminDashboardController::class, 'listBeneficiaries'])->name('admin.beneficiaries.list');
Route::get('/staff/approve', [AdminDashboardController::class, 'approveStaff'])->name('admin.staff.approve');
Route::get('/staff/list', [AdminDashboardController::class, 'listStaff'])->name('admin.staff.list');
Route::get('/account', [AdminDashboardController::class, 'accountInformation'])->name('admin.account');

//Route for Staff Approval in the super admin dashboard
Route::get('/superadmin/approved-staff', [AdminController::class, 'showApprovalPage'])->name('superadmin.approved-staff');
Route::patch('/superadmin/approved-staff/{id}', [AdminController::class, 'approveStaff'])->name('superadmin.approveStaff');

//Route for show staff info in the super admin dashboard
Route::get('/superadmin/staff/{id}', [AdminController::class, 'getStaffDetails'])->name('superadmin.staffDetails');

//Route for admin credentials in super admin dashboard
Route::get('/superadmin/admin-account', [AdminController::class, 'showAdminPage'])->name('superadmin.admin-account');
Route::post('/admin/create', [AdminController::class, 'createAdmin'])->name('admin.create');
Route::put('/admin/edit/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit');
Route::get('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');
Route::put('/admin/toggle-status/{id}', [AdminController::class, 'toggleAdminStatus'])->name('admin.toggleStatus');
Route::put('/admin/reset-password/{id}', [AdminController::class, 'resetPassword'])->name('admin.resetPassword');


//Route for the Staff Dashboard
Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
Route::get('/staff/listBeneficiary', [StaffController::class, 'listBeneficiary'])->name('staff.listBeneficiary');
Route::get('/staff/staffInformation', [StaffController::class, 'staffInformation'])->name('staff.staffInformation');

//for creating beneficiary
Route::get('/api/provinces/{regionId}', [GetAddressOptions::class, 'getProvincesByRegion']);
Route::get('/api/cities/{provinceId}', [GetAddressOptions::class, 'getCitiesByProvince']);
Route::get('/api/barangays/{cityId}', [GetAddressOptions::class, 'getBarangaysByCity']);
Route::get('/api/houses/{barangayId}', [GetAddressOptions::class, 'getHousesByBarangay']);
