<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Form Login
     */
    public function login()
    {
        // Kalau sudah login
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('login.login');
    }

    /**
     * Authenticate Login
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan username atau email
        $admin = ModelAdmin::where('admin_username', $request->login)
            ->orWhere('admin_email', $request->login)
            ->first();

        if (!$admin) {
            return back()->with('error', 'Akun tidak ditemukan.');
        }

        // Cek status akun
        if (!$admin->admin_is_active) {
            return back()->with('error', 'Akun dinonaktifkan.');
        }

        // Cek password
        if (!Hash::check($request->password, $admin->admin_password)) {
            return back()->with('error', 'Password salah.');
        }

        // Login
        Auth::guard('admin')->login($admin);

        // Update last login
        $admin->update([
            'admin_last_login' => now()
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Login berhasil.');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Logout berhasil.');
    }
}