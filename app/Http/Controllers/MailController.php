<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;

class MailController extends Controller
{
    /**
     * Send welcome email with verification token
     */
    public function sendWelcomeEmail()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('info-login')->with('error', 'Please login first.');
        }

        // Check if email is already verified
        if ($user->email_verified_at !== null) {
            return redirect()->route('dashboard-profile')->with('info', 'Your email is already verified.');
        }

        // Generate token
        $token = Str::random(64);
        
        // Store token in database (replace existing token if any)
        DB::table('email_verification_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => Hash::make($token),
                'created_at' => now(),
            ]
        );

        // Send email
        try {
            Mail::to($user->email)->send(new WelcomeMail($user, $token));
            return redirect()->route('dashboard-profile')->with('success', 'Verification email sent! Please check your inbox.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard-profile')->with('error', 'Failed to send verification email. Please try again.');
        }
    }

    /**
     * Verify email with token
     */
    public function verifyEmail($token)
    {
        if (empty($token)) {
            return redirect()->route('home')->with('error', 'Invalid verification link.');
        }

        // Find token in database
        $tokenRecord = DB::table('email_verification_tokens')
            ->where('created_at', '>', now()->subHours(24)) // Token valid for 24 hours
            ->get()
            ->first(function ($record) use ($token) {
                return Hash::check($token, $record->token);
            });

        if (!$tokenRecord) {
            return redirect()->route('home')->with('error', 'Invalid or expired verification link.');
        }

        // Find user by email
        $user = User::where('email', $tokenRecord->email)->first();

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        // Verify email
        $user->email_verified_at = now();
        $user->save();

        // Delete used token
        DB::table('email_verification_tokens')->where('email', $user->email)->delete();

        // Auto login if not already logged in
        if (!auth()->check()) {
            auth()->login($user);
        }

        return redirect()->route('dashboard-profile')->with('success', 'Email verified successfully!');
    }
}
