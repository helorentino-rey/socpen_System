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
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ShowAddressController;
use App\Http\Controllers\AddBeneficiaryController;
use App\Http\Controllers\EditBeneficiaryController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\PDFController;

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

//Super Admin Beneficiary Controller
Route::get('/superadmin/beneficiaries/approve', [SuperAdminDashboardController::class, 'approve'])->name('superadmin.beneficiaries.approve');
Route::get('/superadmin/beneficiaries/create', [SuperAdminDashboardController::class, 'create'])->name('superadmin.beneficiaries.create');
Route::get('/superadmin/beneficiaries/list', [SuperAdminDashboardController::class, 'list'])->name('superadmin.beneficiaries.list');
// Route::get('/superadmin/beneficiaries/export', [SuperAdminDashboardController::class, 'export'])->name('superadmin.beneficiaries.export');

//Route for Address
Route::get('/address/provinces/{region_psgc}', [AddressController::class, 'getProvinces']);
Route::get('/address/cities/{provincePsgc}', [AddressController::class, 'getCities']);
Route::get('/address/barangays/{citymuni_psgc}', [AddressController::class, 'getBarangays']);
Route::get('/address/create', [AddressController::class, 'create']);

//Routes Address for Show
Route::get('/get-provinces', [ShowAddressController::class, 'getProvinces'])->name('getProvinces');
Route::get('/get-cities', [ShowAddressController::class, 'getCities'])->name('getCities');
Route::get('/get-barangays', [ShowAddressController::class, 'getBarangays'])->name('getBarangays');

//Staff Register Controller
Route::get('/register', [RegistrationController::class, 'register'])->name('new-register');
Route::post('/register', [RegistrationController::class, 'registerSubmit'])->name('register.submit');
Route::post('/check-email', [RegistrationController::class, 'checkEmail'])->name('check-email');
Route::post('/check-employee-id', [RegistrationController::class, 'checkEmployeeId'])->name('check-employee-id');

Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
Route::get('/staff/listBeneficiary', [StaffController::class, 'listBeneficiary'])->name('staff.listBeneficiary');
Route::get('/beneficiary/create', [StaffController::class, 'create'])->name('staff.beneficiaries.create');
Route::get('/beneficiary/list', [StaffController::class, 'list'])->name('staff.beneficiaries.list');
Route::get('/staff/staffInformation', [StaffController::class, 'staffInformation'])->name('staff.staffInformation');
Route::post('/staff/update', [StaffController::class, 'updateStaffInformation'])->name('staff.update');
Route::post('/staff/update-password', [StaffController::class, 'updatePassword'])->name('staff.updatePassword');

//Route for Check Email Duplication in Staff Registration
Route::post('/check-email', [RegistrationController::class, 'checkEmail']);
Route::post('/check-employee-id', [RegistrationController::class, 'checkEmployeeId']);

//Route for Admin Dashboard
Route::get('/dashboard', [AdminDashboardController::class, 'mDashboard'])->name('admin.dashboard');
// Route::get('/beneficiaries/export', [AdminDashboardController::class, 'export'])->name('admin.beneficiaries.export');
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

//Add, Search and Modal Display Beneficiary Controller
Route::post('/add-submit', [AddBeneficiaryController::class, 'store'])->name('add.submit');
Route::get('/approved-beneficiary', [AddBeneficiaryController::class, 'list'])->name('layouts.file');
Route::post('/beneficiary/{id}/status', [AddBeneficiaryController::class, 'updateStatus'])->name('beneficiary.updateStatus');
Route::get('/beneficiaries/{id}', [AddBeneficiaryController::class, 'show']);
Route::get('/search', [AddBeneficiaryController::class, 'search'])->name('beneficiaries.search');
Route::get('/searchStaff', [AddBeneficiaryController::class, 'searchStaff'])->name('beneficiary.search');
Route::get('/searchSuper', [AddBeneficiaryController::class, 'searchSuper'])->name('benefi.search');

//Edit and Display Beneficiary Controller
Route::get('/layouts/edit/{id}', [EditBeneficiaryController::class, 'edit'])->name('layouts.edit');
Route::put('/beneficiaries/{id}', [EditBeneficiaryController::class, 'update'])->name('beneficiaries.update');

//Pagination Controller
Route::get('/beneficiaries', [PaginationController::class, 'index'])->name('pagination.list');

//Export and Import Controller
Route::post('/beneficiaries/import', [CsvController::class, 'import'])->name('beneficiaries.import');
Route::get('/export-beneficiaries', [CsvController::class, 'export'])->name('beneficiaries.export');

//Pdf Controller
Route::get('/export-pdf', [PDFController::class, 'exportPDF'])->name('export.pdf');
