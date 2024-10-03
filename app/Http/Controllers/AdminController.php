<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('/menu/create'); // Tampilan untuk admin
    }

    public function showAddUserForm()
    {
        // Mengambil semua pengguna untuk ditampilkan di tabel
        $users = User::all();
        return view('admin.add-user', compact('users')); // Mengirimkan data pengguna ke tampilan
    }

    // Menyimpan user baru ke database
    public function storeUser(Request $request)
    {
       
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'no_hp' => 'nullable|string',
                'wa' => 'nullable|string',
                'pin' => 'nullable|string',
                'role' => 'nullable|string|in:user,admin',
            ]);
            // dd($request->all());
            // Membuat pengguna baru
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Enkripsi password
                'no_hp' => $request->no_hp,
                'wa' => $request->wa,
                'pin' => $request->pin,
                'role' => $request->role ?? 'user', // Default ke 'user' jika tidak diisi
            ]);
            $users = User::all();

            return view('admin.add-user', compact('users'))->with('success', 'User berhasil ditambahkan!');
        }
}
