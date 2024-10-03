<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::latest()->get();
        return view('chat.index', compact('chats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document' => 'nullable|file|mimes:doc,docx,pdf|max:2048',
            'email' => 'required|email',
        ]);

        $chat = new Chat();
        $chat->message = $request->input('message');
        $chat->email = $request->input('email');

        // Jika ada gambar yang diunggah
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('chat_images', 'public');
            $chat->image = $imagePath;
        }

        // Jika ada dokumen yang diunggah
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('chat_documents', 'public');
            $chat->document = $documentPath;
        }

        $chat->save();

        $this->sendChatEmail($chat);

        return redirect()->back()->with('success', 'Chat berhasil disimpan!');
    }

    protected function sendChatEmail(Chat $chat)
    {
        $details = [
            'message' => $chat->message,
            'image' => $chat->image,
            'document' => $chat->document,
        ];
        // Mail::to($chat->email)->send(new \App\Mail\ChatMessage($details));

        Mail::send('emails.chat', $details, function ($message) use ($chat) {
            $message->to($chat->email)
                    ->subject('New Chat Message');
        });
    }

}
