<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function resgister()
    {
        return view('livewire.staff.register');
    }
}
