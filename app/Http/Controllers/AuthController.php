<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Mentor;
use App\Models\Anak;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Coba login sebagai Mentor
        $mentor = Mentor::where('username', $request->username)->first();
        if ($mentor && Hash::check($request->password, $mentor->password)) {
            Auth::guard('mentor')->login($mentor);
            return redirect()->route('mentor.dashboard');
        }

        // Coba login sebagai Anak
        $anak = Anak::where('nomor_induk', $request->username)->first();
        if ($anak && Hash::check($request->password, $anak->password)) {
            Auth::guard('anak')->login($anak);
            return redirect()->route('anak.dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        if (Auth::guard('mentor')->check()) {
            Auth::guard('mentor')->logout();
        } elseif (Auth::guard('anak')->check()) {
            Auth::guard('anak')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
