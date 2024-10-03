<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function homeDepan()
{
    return view('home.depan'); // Pastikan file home.depan.blade.php ada di folder resources/views
}
    // Show Login Form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle Login Request
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Redirect berdasarkan role pengguna
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }

        // Jika gagal login
        return redirect('login')->with('error', 'Invalid credentials');
    }

    // Show Registration Form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle Registration Request
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'nullable|string|max:15',
            'wa' => 'nullable|string|max:15',
            'pin' => 'nullable|string|max:10',
            'password' => 'required|min:5|confirmed',
            'role' => 'required|in:user,admin', // Validasi role
        ]);

        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'wa' => $request->wa,
            'pin' => $request->pin,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Simpan role
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect('login')->with('success', 'Registration successful. Please login.');
    }

    // Show Dashboard (for both admin and user)
    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('dashboard'); // Tampilan untuk admin
        } else {
            return view('dashboard'); // Tampilan untuk user
        }
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home.depan');
    }
}
