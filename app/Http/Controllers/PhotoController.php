<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|string',
        ]);

        // Ambil data gambar dari request
        $imageData = $request->input('image');

        // Menghilangkan bagian URL data (data:image/jpeg;base64,)
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);

        // Generate nama file gambar
        $imageName = Str::random(10) . '.jpg';
        $imagePath = 'public/photos/' . $imageName;

        // Decode dan simpan gambar
        Storage::put($imagePath, base64_decode($imageData));

        return response()->json([
            'success' => true,
            'image' => $imageName,
            'path' => Storage::url($imagePath)  // Mengembalikan URL gambar
        ]);
    }
}
