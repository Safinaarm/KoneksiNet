<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    // Menampilkan form kirim pesan dan daftar pesan yang telah dikirim
    public function create()
    {
        $sentMessages = Message::with('sender', 'recipient')->get();
        return view('messages.create', compact('sentMessages'));
    }

    // Menangani pengiriman pesan
    public function sendMessage(Request $request)
    {
        $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'message_text' => 'required|string',
        ]);

        // Temukan penerima berdasarkan email
        $recipient = User::where('email', $request->recipient)->first();

        if (!$recipient) {
            return back()->with('error', 'Penerima tidak ditemukan.');
        }

        $message = new Message();
        $message->sender = auth()->user()->email; // Menggunakan ID pengirim
        $message->recipient = $recipient->email; // Menggunakan ID penerima
        $message->subject = $request->subject;
        $message->message_text = $request->message_text;
        $message->save();

        return back()->with('success', 'Pesan berhasil dikirim.');
    }

    public function showDetail($id)
    {
        // Ambil pesan dengan ID yang diberikan
        $sentMessage = Message::findOrFail($id);
        
        // Ambil semua pesan yang berkaitan
        $messages = Message::with(['sender', 'recipient'])->get();
    
    
        return view('messages.detail', compact('messages', 'sentMessage'));
    }
    
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_text' => 'required|string',
            'subject' => 'nullable|string', // Include subject in validation if needed
        ]);
    
        // Kirim balasan
        $message = new Message();
        $message->sender = auth()->user()->email; // ID pengguna yang sedang login
        $message->recipient = Message::findOrFail($id)->recipient; // Penerima dari pesan yang dibalas
        $message->message_text = $request->reply_text;
        $message->subject = $request->input('subject', ''); // Default to empty if not provided
        $message->save();
    
        return redirect()->route('messages.detail', $id)->with('success', 'Balasan berhasil dikirim!');
    }
}
