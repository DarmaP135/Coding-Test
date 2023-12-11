<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function dashboard()
    {
        // Logika untuk halaman dashboard
        return view('Dashboard.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|min:12|max:15|unique:users,nomor_telepon',
            'nomor_sim' => 'required|regex:/^[0-9]+-[0-9]+-[0-9]+$/|min:14|unique:users,nomor_sim',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Pemilik Mobil,Penyewa Mobil',
        ]);

        // Pembuatan akun pengguna
        $user = User::create([
            'id'   => Str::uuid()->toString(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'nomor_sim' => $request->nomor_sim,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nomor_telepon', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $request->session()->put('role', Auth::user()->role);
            return redirect('/'); // Change this to your desired redirect path
        }

        // Authentication failed
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }
}
