<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MessageChat;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat');
    }
    public $messages = [];
    public $message;

    public function mount()
    {
        $this->messages = MessageChat::with('user')->latest()->get();
    }

    public function sendMessage()
    {
        $this->validate(['message' => 'required|string|max:255']);
        
        MessageChat::create([
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->message = '';
        $this->messages = MessageChat::with('user')->latest()->get();
    }

    
}
