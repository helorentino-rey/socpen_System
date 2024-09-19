<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\SuperAdmin;

class IdentifyUser
{
    public function handle(Request $request, Closure $next)
    {
        // Check for authenticated user from different guards
        $user = Auth::guard('superadmin')->user() ?? Auth::guard('admin')->user() ?? Auth::guard('staff')->user();

        // Perform additional checks or operations
        if ($user instanceof SuperAdmin) {
            // Perform operations specific to SuperAdmin
        } elseif ($user instanceof Admin) {
            // Perform operations specific to Admin
        } elseif ($user instanceof Staff) {
            // Perform operations specific to Staff
        }

        // Set the user in the request
        if ($user) {
            $request->merge(['authenticated_user' => $user]);
        } else {
            // Handle the case where the user is not authenticated
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
