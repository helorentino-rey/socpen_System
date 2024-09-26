<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $query = Log::orderBy('created_at', 'desc');

        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $logs = $query->get();

        return view('livewire.superadmin.notifications', compact('logs'));
    }
}
