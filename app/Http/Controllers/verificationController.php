<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function showVerifyForm()
    {
        return view('backend.dashboard.layouts.verification');
    }

    public function verifyNumber(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|integer',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $inputCode = $request->input('otp_code');

        if ($inputCode == $user->number_verified_code) {
            $user->number_verified_code = $inputCode;
            $user->number_verified_at = now();
            $user->save();

            return redirect()->route('verify.form')->with('success', 'Number verified successfully.');
        }

    }
}
