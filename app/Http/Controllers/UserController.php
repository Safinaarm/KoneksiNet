<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Tampilan untuk user
    }

    public function create()
    {
        // Mengambil semua pengguna untuk ditampilkan di tabel
        $users = User::all();
        return view('admin.add-user', compact('users')); // Mengirimkan data pengguna ke tampilan
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        $validated['password'] = bcrypt($validated['password']); // Hash password

        User::create($validated);

        return redirect()->route('users.create')->with('success', 'User baru telah ditambahkan!'); // Redirect ke create
    }
}

