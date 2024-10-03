<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Menampilkan semua postingan beserta komentar
    public function index()
    {
        $posts = Post::with('comments')->get(); // Mengambil semua post dengan komentar
        return view('dashboard', compact('posts')); // Mengganti dengan 'dashboard' untuk tampilan
    }

    // Menyimpan postingan baru
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $path = $request->file('photo')->store('images', 'public'); // Menyimpan foto di public storage

        // Membuat post baru dengan path gambar
        $post = Post::create(['image_path' => $path, 'likes' => 0]); // Menyimpan post baru dengan inisialisasi likes 0

        return redirect()->route('dashboard'); // Redirect ke dashboard
    }

    // Menambahkan komentar ke postingan
    public function addComment(Request $request, $id)
    {
        // Validasi konten komentar
        $request->validate(['content' => 'required|string|max:255']); 
        
        // Mencari post berdasarkan ID
        $post = Post::findOrFail($id); 
        
        // Menggunakan input dari request untuk membuat komentar
        $post->comments()->create(['content' => $request->input('content')]); 
        
        // Redirect kembali ke halaman index
        return redirect()->route('dashboard'); // Redirect ke dashboard
    }

    // Menyukai postingan
    public function likePost($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('likes'); // Meningkatkan jumlah like
        return back(); // Kembali ke halaman sebelumnya
    }
}
