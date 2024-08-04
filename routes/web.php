<?php

use App\Livewire\LandingPage;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminForLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffLoginController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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
// });

//Route for Landing Page
Route::get('/', LandingPage::class)->name('landing.page');

// Admin login
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

// Staff login
Route::get('/staff/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.login');

//Staff Register
Route::get('/register', function () {
    return view('livewire.staff.register');
})->name('register');

//Route to Save in the Database
Route::post('/register', [StaffController::class, 'store'])->name('register.submit');

//Admin Login
Route::post('/admin/login', [AdminForLoginController::class, 'adminLogin'])->name('admin.login');


Route::prefix('admin')->group(function () {

    // Admin Login Route
    Route::get('login', [AdminForLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminForLoginController::class, 'adminLogin']);

    // Protected routes for authenticated admins
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.mainDashboard');
    });

    // Admin Logout Route
    Route::post('logout', [AdminForLoginController::class, 'logout'])->name('admin.logout');
    
});

//Route for Dashboard
Route::get('/dashboard', [AdminDashboardController::class, 'mDashboard'])->name('admin.dashboard');
Route::get('/beneficiaries/search', [AdminDashboardController::class, 'searchBeneficiaries'])->name('admin.beneficiaries.search');
Route::get('/beneficiaries/approve', [AdminDashboardController::class, 'approveBeneficiaries'])->name('admin.beneficiaries.approve');
Route::get('/beneficiaries/list', [AdminDashboardController::class, 'listBeneficiaries'])->name('admin.beneficiaries.list');
Route::get('/staff/approve', [AdminDashboardController::class, 'approveStaff'])->name('admin.staff.approve');
Route::get('/staff/list', [AdminDashboardController::class, 'listStaff'])->name('admin.staff.list');
Route::get('/account', [AdminDashboardController::class, 'accountInformation'])->name('admin.account');

//Route for Staff Approval in the Dashboard Admin
Route::get('/admin/approve-staff', [AdminController::class, 'showApprovalPage'])->name('admin.staff.approve');
Route::patch('/admin/approve-staff/{id}', [AdminController::class, 'approveStaff'])->name('admin.approveStaff');

//Route for Staff Login after Approval
Route::get('/staff/login', [StaffLoginController::class, 'showLoginForm'])->name('staff.loginForm');
Route::post('/staff/login', [StaffLoginController::class, 'login'])->name('staff.login');

//Route for the Staff Dashboard
Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');