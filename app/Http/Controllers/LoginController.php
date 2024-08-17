<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\SuperAdmin;
use App\Models\Admin;
use App\Models\Staff;
use App\Mail\OtpMail;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $employee_id = $request->input('employee_id');
        $password = $request->input('password');

        // Check SuperAdmin
        $user = SuperAdmin::where('employee_id', $employee_id)->first();
        if ($user && Hash::check($password, $user->password) && $user->usertype === 'super_admin') {
            Auth::guard('superadmin')->login($user);
            return redirect()->route('superadmin.dashboard');
        }

        // Check Admin
        $user = Admin::where('employee_id', $employee_id)->first();
        if ($user) {
            if (!$user->is_active) {
                return redirect()->back()->withErrors(['message' => 'Your account is not active. Please contact the administrator.']);
            }

            if (Hash::check($password, $user->password) && $user->usertype === 'admin') {
                Auth::guard('admin')->login($user);
                return redirect()->route('admin.dashboard');
            }
        }

        // Check Staff
        $user = Staff::where('employee_id', $employee_id)->first();
        if ($user && Hash::check($password, $user->password) && $user->usertype === 'staff') {
            if ($user->status === 'active') {
                // Generate OTP
                $otp = $this->generateOTP();

                // Store OTP in session with expiration
                session(['otp' => $otp, 'user_id' => $user->id, 'otp_expires_at' => now()->addSeconds(60), 'last_otp_sent_time' => now()]);

                // Send OTP to user's email
                $this->sendOTPEmail($user->email, $otp);

                // Redirect to OTP verification page
                return redirect()->route('staff.otp.verify');
            } else {
                return redirect()->back()->with('error', 'Your account is awaiting super admin approval.');
            }
        }

        // Set session error message for invalid credentials
        return redirect()->back()->withErrors(['message' => 'Invalid Employee ID or Password']);
    }

    public function superadminLogout()
    {
        Auth::guard('superadmin')->logout();
        return redirect()->route('landing-page')->with('status', 'You have been logged out.');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('landing-page')->with('status', 'You have been logged out.');
    }

    public function staffLogout()
    {
        Auth::guard('staff')->logout();
        return redirect()->route('landing-page')->with('status', 'You have been logged out.');
    }

    public function showOtpForm(Request $request)
    {
        $lastOtpSentTime = $request->session()->get('last_otp_sent_time', now());
        $lastOtpSentTimestamp = $lastOtpSentTime->timestamp; // Convert to Unix timestamp
        return view('auth.otp_verify', compact('lastOtpSentTimestamp'));
    }

    public function sendOtp(Request $request)
    {
        $lastOtpSentTime = $request->session()->get('last_otp_sent_time', now());
        $currentTime = now();

        // Check if 60 seconds have passed since the last OTP was sent
        if ($currentTime->diffInSeconds($lastOtpSentTime) < 60) {
            return redirect()->route('staff.otp.verify')
                ->withErrors(['otp' => 'Please wait 60 seconds before resending the OTP.']);
        }

        // Generate a new OTP
        $otp = $this->generateOTP();

        // Store OTP and last sent time in the session
        $request->session()->put('otp', $otp);
        $request->session()->put('last_otp_sent_time', $currentTime);
        $request->session()->put('otp_expires_at', $currentTime->addSeconds(60)); // Set OTP expiration time

        // Retrieve the authenticated user
        $user = Auth::guard('staff')->user();

        if (!$user) {
            return redirect()->route('staff.otp.verify')
                ->withErrors(['otp' => 'User not authenticated.']);
        }

        // Send OTP to the user's email
        $email = $user->email;
        Mail::to($email)->send(new OtpMail($otp));

        // Redirect back with success message
        return redirect()->route('staff.otp.verify')
            ->with('status', 'OTP has been sent to your email.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $otp = $request->session()->get('otp');
        $userId = $request->session()->get('user_id');
        $otpExpiresAt = $request->session()->get('otp_expires_at');

        if ($otpExpiresAt && now()->greaterThan($otpExpiresAt)) {
            return redirect()->back()->withErrors(['otp' => 'OTP has expired. Please request a new one.']);
        }

        if ($request->otp == $otp) {
            // Clear OTP from session
            session()->forget(['otp', 'user_id', 'otp_expires_at', 'last_otp_sent_time']);

            // Log in the user
            $user = Staff::find($userId);
            Auth::login($user);

            return redirect()->route('staff.dashboard');
        } else {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
        }
    }

    private function generateOTP($length = 6)
    {
        return rand(pow(10, $length - 1), pow(10, $length) - 1);
    }

    private function sendOTPEmail($email, $otp)
    {
        Mail::send([], [], function ($message) use ($email, $otp) {
            $message->to($email)
                ->subject('Your OTP Code')
                ->text('Your OTP code is: ' . $otp);
        });
    }
}
