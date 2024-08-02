<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.staff.staff-login');
    }
}