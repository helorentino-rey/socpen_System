<?php

namespace App\Http\Controllers;
use App\Models\Log;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $logs = Log::orderBy('created_at', 'desc')->get();
        return view('livewire.superadmin.notifications', compact('logs'));
    }
}
